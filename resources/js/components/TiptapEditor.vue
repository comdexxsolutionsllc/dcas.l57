<template>
    <editor :extensions="extensions">
        <div slot="content" slot-scope="props">
            <h1>Yay Headlines!</h1>
            <p>All these <strong>cool tags</strong> are working now.</p>
        </div>
    </editor>
</template>

<script>
    import {Editor} from 'tiptap'
    import {
        BlockquoteNode,
        BoldMark,
        BulletListNode,
        CodeBlockNode,
        CodeMark,
        HardBreakNode,
        HeadingNode,
        HistoryExtension,
        ImageNode,
        ItalicMark,
        LinkMark,
        ListItemNode,
        OrderedListNode,
        PlaceholderExtension,
        StrikeMark,
        TodoItemNode,
        TodoListNode,
        UnderlineMark,
    } from 'tiptap-extensions'

    export default {
        components: {
            Editor,
        },
        data() {
            return {
                extensions: [
                    new BlockquoteNode(),
                    new BulletListNode(),
                    new CodeBlockNode(),
                    new HardBreakNode(),
                    new HeadingNode({maxLevel: 3}),
                    new ImageNode(),
                    new ListItemNode(),
                    new OrderedListNode(),
                    new TodoItemNode(),
                    new TodoListNode(),
                    new BoldMark(),
                    new CodeMark(),
                    new ItalicMark(),
                    new LinkMark(),
                    new StrikeMark(),
                    new UnderlineMark(),
                    new HistoryExtension(),
                    new PlaceholderExtension(),
                ],
            }
        },
    }
</script>

<style scoped>
</style>
