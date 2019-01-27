import { message, danger, fail, warn, schedule } from "danger"
import includes from "lodash/includes"
import first from "lodash/first"

const packageBlacklist = "spaced-between"

const hasCHANGELOGChanges = includes(danger.git.modified_files, "CHANGELOG.md")
const hasLibraryChanges = first(danger.git.modified_files, path => path.startsWith("app/"))
const lockfileChanged = includes(danger.git.modified_files, 'package.lock');
const modifiedMD = danger.git.modified_files.join("- ")
const packageChanged = includes(danger.git.modified_files, 'package.json');

message("Changed Files in this PR: \n - " + modifiedMD)

if (!danger.github.pr.assignee) {
    const method = danger.github.pr.title.includes("WIP") ? warn : fail

    method("This pull request needs an assignee, and optionally include any reviewers.")
}

if (danger.github.pr.body.length < 10) {
    fail("This pull request needs an description.")
}

if (hasLibraryChanges && !hasCHANGELOGChanges) {
    warn("This pull request may need a CHANGELOG entry.")
}

if (packageChanged && !lockfileChanged) {
    const message = 'Changes were made to package.json, but not to package.lock';
    const idea = 'Perhaps you need to run `npm install`?';

    warn(`${message} - <i>${idea}</i>`);
}


schedule(async () => {
    const packageDiff = await danger.git.JSONDiffForFile("package.json")

    if (packageDiff.dependencies) {
        const newDependencies = packageDiff.dependencies.added
        if (includes(newDependencies, packageBlacklist)) {
            fail(`Do not add ${packageBlacklist} to our dependencies, see CVE #1")
      }
  }
})