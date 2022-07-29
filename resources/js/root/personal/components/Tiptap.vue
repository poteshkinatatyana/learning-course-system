<template>
  <div class="container">
    <tiptap-buttons :editor="editor"  class="tiptap_header" @addImage="addImage"/>

    <editor-content :editor="editor" class="tiptap_list" />
  </div>
</template>

<script>
import { Editor, EditorContent } from "@tiptap/vue-3";
import StarterKit from "@tiptap/starter-kit";
import Table from "@tiptap/extension-table";
import TableRow from "@tiptap/extension-table-row";
import TableCell from "@tiptap/extension-table-cell";
import TableHeader from "@tiptap/extension-table-header";
import TextAlign from "@tiptap/extension-text-align";
import Highlight from "@tiptap/extension-highlight";
import TiptapButtons from "./TiptapButtons.vue";
import Image from '@tiptap/extension-image'

const CustomTableCell = TableCell.extend({
  addAttributes() {
    return {
      // extend the existing attributes …
      ...this.parent?.(),

      // and add a new one …
      backgroundColor: {
        default: null,
        parseHTML: (element) => element.getAttribute("data-background-color"),
        renderHTML: (attributes) => {
          return {
            "data-background-color": attributes.backgroundColor,
            style: `background-color: ${attributes.backgroundColor}`,
          };
        },
      },
    };
  },
});

export default {
  components: {
    EditorContent,
    TiptapButtons,
  },

  data() {
    return {
      editor: null,
    };
  },

  watch: {
    modelValue(value) {
      // HTML
      const isSame = this.editor.getHTML() === value;

      // JSON
      // const isSame = JSON.stringify(this.editor.getJSON()) === JSON.stringify(value)

      if (isSame) {
        return;
      }

      this.editor.commands.setContent(value, false);
    },
  },

  methods:{
     addImage() {
      const url = prompt("URL");

      if(url){
        this.editor.chain().focus().setImage({ src: url }).run()
      }
  }
  },

  mounted() {
    this.editor = new Editor({
      content: "<p>I’m running Tiptap with Vue.js. 🎉</p>",
      extensions: [
        StarterKit,
        Table.configure({
          resizable: true,
        }),
        TableRow,
        Image,
        TableHeader,
        // Default TableCell
        // TableCell,
        // Custom TableCell with backgroundColor attribute
        CustomTableCell,
        TextAlign.configure({
          types: ["heading", "paragraph"],
        }),
        Highlight,
      ],
      content: this.modelValue,
      onUpdate: () => {
        // HTML
        this.$emit("update:modelValue", this.editor.getHTML());

        // JSON
        // this.$emit('update:modelValue', this.editor.getJSON())
      },
    });
  },

  beforeUnmount() {
    this.editor.destroy();
  },
  props: {
    modelValue: {
      type: String,
      default: "",
    },
  },

}
</script>
<style>
.tiptap_header{
    background-color: white;
    position: sticky ;
    top: 60px;
    z-index: 2;
}
.tiptap_list {
  padding: 20px;
  margin-top: 30px;
  border: 2px solid #dbdbdb8f;
}
</style>
