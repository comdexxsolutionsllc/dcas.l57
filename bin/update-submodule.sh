#!/usr/bin/env bash

echo "Updating submodules..."

git checkout master && git pull
git pull --recurse-submodules
git submodule update --remote --recursive

echo "Submodules updated."
