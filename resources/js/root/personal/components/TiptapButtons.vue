<template>
  <div v-if="editor" style="background-color: white;">

    <button
      @click="editor.chain().focus().undo().run()"
      class="btn btn-link btn_tiptap"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="20"
        height="20"
        fill="currentColor"
        class="bi bi-arrow-counterclockwise"
        viewBox="0 0 16 16"
      >
        <path
          fill-rule="evenodd"
          d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"
        />
        <path
          d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"
        />
      </svg>
    </button>
    <button
      @click="editor.chain().focus().redo().run()"
      class="btn btn-link btn_tiptap"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="20"
        height="20"
        fill="currentColor"
        class="bi bi-arrow-clockwise"
        viewBox="0 0 16 16"
      >
        <path
          fill-rule="evenodd"
          d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"
        />
        <path
          d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"
        />
      </svg>
    </button>
    <span class="line"></span>
            <button
              @click="editor.chain().focus().toggleBold().run()"
              :class="{ 'is-active': editor.isActive('bold') }"
              class="btn btn-link btn_tiptap"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                fill="currentColor"
                class="bi bi-type-bold"
                viewBox="0 0 16 16"
              >
                <path
                  d="M8.21 13c2.106 0 3.412-1.087 3.412-2.823 0-1.306-.984-2.283-2.324-2.386v-.055a2.176 2.176 0 0 0 1.852-2.14c0-1.51-1.162-2.46-3.014-2.46H3.843V13H8.21zM5.908 4.674h1.696c.963 0 1.517.451 1.517 1.244 0 .834-.629 1.32-1.73 1.32H5.908V4.673zm0 6.788V8.598h1.73c1.217 0 1.88.492 1.88 1.415 0 .943-.643 1.449-1.832 1.449H5.907z"
                />
              </svg>
            </button>
            <button
              @click="editor.chain().focus().toggleItalic().run()"
              :class="{ 'is-active': editor.isActive('italic') }"
              class="btn btn-link btn_tiptap"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                fill="currentColor"
                class="bi bi-type-italic"
                viewBox="0 0 16 16"
              >
                <path
                  d="M7.991 11.674 9.53 4.455c.123-.595.246-.71 1.347-.807l.11-.52H7.211l-.11.52c1.06.096 1.128.212 1.005.807L6.57 11.674c-.123.595-.246.71-1.346.806l-.11.52h3.774l.11-.52c-1.06-.095-1.129-.211-1.006-.806z"
                />
              </svg>
            </button>
            <button
              @click="editor.chain().focus().toggleStrike().run()"
              :class="{ 'is-active': editor.isActive('strike') }"
              class="btn btn-link btn_tiptap"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                fill="currentColor"
                class="bi bi-type-strikethrough"
                viewBox="0 0 16 16"
              >
                <path
                  d="M6.333 5.686c0 .31.083.581.27.814H5.166a2.776 2.776 0 0 1-.099-.76c0-1.627 1.436-2.768 3.48-2.768 1.969 0 3.39 1.175 3.445 2.85h-1.23c-.11-1.08-.964-1.743-2.25-1.743-1.23 0-2.18.602-2.18 1.607zm2.194 7.478c-2.153 0-3.589-1.107-3.705-2.81h1.23c.144 1.06 1.129 1.703 2.544 1.703 1.34 0 2.31-.705 2.31-1.675 0-.827-.547-1.374-1.914-1.675L8.046 8.5H1v-1h14v1h-3.504c.468.437.675.994.675 1.697 0 1.826-1.436 2.967-3.644 2.967z"
                />
              </svg>
            </button>


    <button
      @click="editor.chain().focus().toggleCode().run()"
      :class="{ 'is-active': editor.isActive('code') }"
      class="btn btn-link btn_tiptap"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="20"
        height="20"
        fill="currentColor"
        class="bi bi-code"
        viewBox="0 0 16 16"
      >
        <path
          d="M5.854 4.854a.5.5 0 1 0-.708-.708l-3.5 3.5a.5.5 0 0 0 0 .708l3.5 3.5a.5.5 0 0 0 .708-.708L2.707 8l3.147-3.146zm4.292 0a.5.5 0 0 1 .708-.708l3.5 3.5a.5.5 0 0 1 0 .708l-3.5 3.5a.5.5 0 0 1-.708-.708L13.293 8l-3.147-3.146z"
        />
      </svg>
    </button>
    <!-- <button
      @click="editor.chain().focus().unsetAllMarks().run()"
      class="btn btn-link btn_tiptap"
    >
      clear marks
    </button>
    <button
      @click="editor.chain().focus().clearNodes().run()"
      class="btn btn-link btn_tiptap"
    >
      clear nodes
    </button>
    <button
      @click="editor.chain().focus().setParagraph().run()"
      :class="{ 'is-active': editor.isActive('paragraph') }"
      class="btn btn-link btn_tiptap"
    >
      paragraph
    </button> -->

    <!-- <div class="btn-group" role="group">
      <button
        id="btnGroupDrop1"
        type="button"
        class="btn btn-link btn_tiptap dropdown-toggle"
        data-bs-toggle="dropdown"
        aria-expanded="false"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="20"
          height="20"
          fill="currentColor"
          class="bi bi-type"
          viewBox="0 0 16 16"
        >
          <path
            d="m2.244 13.081.943-2.803H6.66l.944 2.803H8.86L5.54 3.75H4.322L1 13.081h1.244zm2.7-7.923L6.34 9.314H3.51l1.4-4.156h.034zm9.146 7.027h.035v.896h1.128V8.125c0-1.51-1.114-2.345-2.646-2.345-1.736 0-2.59.916-2.666 2.174h1.108c.068-.718.595-1.19 1.517-1.19.971 0 1.518.52 1.518 1.464v.731H12.19c-1.647.007-2.522.8-2.522 2.058 0 1.319.957 2.18 2.345 2.18 1.06 0 1.716-.43 2.078-1.011zm-1.763.035c-.752 0-1.456-.397-1.456-1.244 0-.65.424-1.115 1.408-1.115h1.805v.834c0 .896-.752 1.525-1.757 1.525z"
          />
        </svg>
      </button>
      <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
        <li class="">
          <div class="item_tiptap"> -->
            <button
              @click="editor.chain().focus().toggleHeading({ level: 1 }).run()"
              :class="{ 'is-active': editor.isActive('heading', { level: 1 }) }"
              class="btn btn-link btn_tiptap"
            >
              h1
            </button>
            <button
              @click="editor.chain().focus().toggleHeading({ level: 2 }).run()"
              :class="{ 'is-active': editor.isActive('heading', { level: 2 }) }"
              class="btn btn-link btn_tiptap"
            >
              h2
            </button>
            <button
              @click="editor.chain().focus().toggleHeading({ level: 3 }).run()"
              :class="{ 'is-active': editor.isActive('heading', { level: 3 }) }"
              class="btn btn-link btn_tiptap"
            >
              h3
            </button>
            <button
              @click="editor.chain().focus().toggleHeading({ level: 4 }).run()"
              :class="{ 'is-active': editor.isActive('heading', { level: 4 }) }"
              class="btn btn-link btn_tiptap"
            >
              h4
            </button>
            <button
              @click="editor.chain().focus().toggleHeading({ level: 5 }).run()"
              :class="{ 'is-active': editor.isActive('heading', { level: 5 }) }"
              class="btn btn-link btn_tiptap"
            >
              h5
            </button>
            <button
              @click="editor.chain().focus().toggleHeading({ level: 6 }).run()"
              :class="{ 'is-active': editor.isActive('heading', { level: 6 }) }"
              class="btn btn-link btn_tiptap"
            >
              h6
            </button>
          <!-- </div>
        </li>
      </ul>
    </div> -->

    <!-- <div class="btn-group" role="group">
      <button
        id="btnGroupDrop1"
        type="button"
        class="btn btn-link btn_tiptap dropdown-toggle"
        data-bs-toggle="dropdown"
        aria-expanded="false"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="20"
          height="20"
          fill="currentColor"
          class="bi bi-list"
          viewBox="0 0 16 16"
        >
          <path
            fill-rule="evenodd"
            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"
          />
        </svg>
      </button>
      <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
        <li class="">
          <div class="item_tiptap"> -->
            <button
              @click="editor.chain().focus().toggleBulletList().run()"
              :class="{ 'is-active': editor.isActive('bulletList') }"
              class="btn btn-link btn_tiptap"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                fill="currentColor"
                class="bi bi-list-ul"
                viewBox="0 0 16 16"
              >
                <path
                  fill-rule="evenodd"
                  d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"
                />
              </svg>
            </button>
            <button
              @click="editor.chain().focus().toggleOrderedList().run()"
              :class="{ 'is-active': editor.isActive('orderedList') }"
              class="btn btn-link btn_tiptap"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                fill="currentColor"
                class="bi bi-list-ol"
                viewBox="0 0 16 16"
              >
                <path
                  fill-rule="evenodd"
                  d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z"
                />
                <path
                  d="M1.713 11.865v-.474H2c.217 0 .363-.137.363-.317 0-.185-.158-.31-.361-.31-.223 0-.367.152-.373.31h-.59c.016-.467.373-.787.986-.787.588-.002.954.291.957.703a.595.595 0 0 1-.492.594v.033a.615.615 0 0 1 .569.631c.003.533-.502.8-1.051.8-.656 0-1-.37-1.008-.794h.582c.008.178.186.306.422.309.254 0 .424-.145.422-.35-.002-.195-.155-.348-.414-.348h-.3zm-.004-4.699h-.604v-.035c0-.408.295-.844.958-.844.583 0 .96.326.96.756 0 .389-.257.617-.476.848l-.537.572v.03h1.054V9H1.143v-.395l.957-.99c.138-.142.293-.304.293-.508 0-.18-.147-.32-.342-.32a.33.33 0 0 0-.342.338v.041zM2.564 5h-.635V2.924h-.031l-.598.42v-.567l.629-.443h.635V5z"
                />
              </svg>
            </button>

            <button
              @click="editor.chain().focus().sinkListItem('listItem').run()"
              :disabled="!editor.can().sinkListItem('listItem')"
              class="btn btn-link btn_tiptap"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                fill="currentColor"
                class="bi bi-list-nested"
                viewBox="0 0 16 16"
              >
                <path
                  fill-rule="evenodd"
                  d="M4.5 11.5A.5.5 0 0 1 5 11h10a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 1 3h10a.5.5 0 0 1 0 1H1a.5.5 0 0 1-.5-.5z"
                />
              </svg>
            </button>
            <button
              @click="editor.chain().focus().liftListItem('listItem').run()"
              :disabled="!editor.can().liftListItem('listItem')"
              class="btn btn-link btn_tiptap"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                fill="currentColor"
                class="bi bi-list"
                viewBox="0 0 16 16"
              >
                <path
                  fill-rule="evenodd"
                  d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"
                />
              </svg>
            </button>
          <!-- </div>
        </li>
      </ul>
    </div> -->

    <button
      @click="editor.chain().focus().toggleCodeBlock().run()"
      :class="{ 'is-active': editor.isActive('codeBlock') }"
      class="btn btn-link btn_tiptap"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="20"
        height="20"
        fill="currentColor"
        class="bi bi-braces"
        viewBox="0 0 16 16"
      >
        <path
          d="M2.114 8.063V7.9c1.005-.102 1.497-.615 1.497-1.6V4.503c0-1.094.39-1.538 1.354-1.538h.273V2h-.376C3.25 2 2.49 2.759 2.49 4.352v1.524c0 1.094-.376 1.456-1.49 1.456v1.299c1.114 0 1.49.362 1.49 1.456v1.524c0 1.593.759 2.352 2.372 2.352h.376v-.964h-.273c-.964 0-1.354-.444-1.354-1.538V9.663c0-.984-.492-1.497-1.497-1.6zM13.886 7.9v.163c-1.005.103-1.497.616-1.497 1.6v1.798c0 1.094-.39 1.538-1.354 1.538h-.273v.964h.376c1.613 0 2.372-.759 2.372-2.352v-1.524c0-1.094.376-1.456 1.49-1.456V7.332c-1.114 0-1.49-.362-1.49-1.456V4.352C13.51 2.759 12.75 2 11.138 2h-.376v.964h.273c.964 0 1.354.444 1.354 1.538V6.3c0 .984.492 1.497 1.497 1.6z"
        />
      </svg>
    </button>
    <button
      @click="editor.chain().focus().toggleBlockquote().run()"
      :class="{ 'is-active': editor.isActive('blockquote') }"
      class="btn btn-link btn_tiptap"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="20"
        height="20"
        fill="currentColor"
        class="bi bi-paragraph"
        viewBox="0 0 16 16"
      >
        <path
          d="M10.5 15a.5.5 0 0 1-.5-.5V2H9v12.5a.5.5 0 0 1-1 0V9H7a4 4 0 1 1 0-8h5.5a.5.5 0 0 1 0 1H11v12.5a.5.5 0 0 1-.5.5z"
        />
      </svg>
    </button>
    <button
      @click="editor.chain().focus().setHorizontalRule().run()"
      class="btn btn-link btn_tiptap"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="20"
        height="20"
        fill="currentColor"
        class="bi bi-dash-lg"
        viewBox="0 0 16 16"
      >
        <path
          fill-rule="evenodd"
          d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"
        />
      </svg>
    </button>
    <!-- <button
      @click="editor.chain().focus().setHardBreak().run()"
      class="btn btn-link btn_tiptap"
    >
      hard break
    </button> -->
    <button
      @click="editor.chain().focus().toggleBlockquote().run()"
      :class="{ 'is-active': editor.isActive('blockquote') }"
      class="btn btn-link btn_tiptap"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="20"
        height="20"
        fill="currentColor"
        class="bi bi-quote"
        viewBox="0 0 16 16"
      >
        <path
          d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z"
        />
      </svg>
    </button>

    <button
      @click="editor.chain().focus().toggleHighlight().run()"
      :class="{ 'is-active': editor.isActive('highlight') }"
      class="btn btn-link btn_tiptap"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="20"
        height="20"
        fill="currentColor"
        class="bi bi-pencil-square"
        viewBox="0 0 16 16"
      >
        <path
          d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"
        />
        <path
          fill-rule="evenodd"
          d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"
        />
      </svg>
    </button>

    <button
      @click="editor.chain().focus().setTextAlign('left').run()"
      :class="{ 'is-active': editor.isActive({ textAlign: 'left' }) }"
      class="btn btn-link btn_tiptap"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="20"
        height="20"
        fill="currentColor"
        class="bi bi-text-left"
        viewBox="0 0 16 16"
      >
        <path
          fill-rule="evenodd"
          d="M2 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"
        />
      </svg>
    </button>
    <button
      @click="editor.chain().focus().setTextAlign('center').run()"
      :class="{ 'is-active': editor.isActive({ textAlign: 'center' }) }"
      class="btn btn-link btn_tiptap"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="20"
        height="20"
        fill="currentColor"
        class="bi bi-text-center"
        viewBox="0 0 16 16"
      >
        <path
          fill-rule="evenodd"
          d="M4 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"
        />
      </svg>
    </button>
    <button
      @click="editor.chain().focus().setTextAlign('right').run()"
      :class="{ 'is-active': editor.isActive({ textAlign: 'right' }) }"
      class="btn btn-link btn_tiptap"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="20"
        height="20"
        fill="currentColor"
        class="bi bi-text-right"
        viewBox="0 0 16 16"
      >
        <path
          fill-rule="evenodd"
          d="M6 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-4-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-4-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"
        />
      </svg>
    </button>
    <button
      @click="editor.chain().focus().setTextAlign('justify').run()"
      :class="{ 'is-active': editor.isActive({ textAlign: 'justify' }) }"
      class="btn btn-link btn_tiptap"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="20"
        height="20"
        fill="currentColor"
        class="bi bi-justify-left"
        viewBox="0 0 16 16"
      >
        <path
          fill-rule="evenodd"
          d="M2 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"
        />
      </svg>
    </button>

    <button @click="$emit('addImage')"  class="btn btn-outline-secondary btn_tiptap btn_table">img</button>

    <button type="button"  class="btn btn-link btn_tiptap"  data-bs-toggle="modal" data-bs-target="#largeModal"> Настройки таблицы</button>
              <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true" style="display: none; z-index: 5;">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Настройки таблицы</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style=" z-index: 5;">

            <button
              @click="
                editor
                  .chain()
                  .focus()
                  .insertTable({ rows: 3, cols: 3, withHeaderRow: true })
                  .run()
              "
              class="btn btn-outline-secondary btn_tiptap btn_table"
            >
              Добавить таблицу
            </button>
            <button
              @click="editor.chain().focus().addColumnBefore().run()"
              :disabled="!editor.can().addColumnBefore()"
              class="btn btn-outline-secondary btn_tiptap btn_table"
            >
              Столбец до
            </button>
            <button
              @click="editor.chain().focus().addColumnAfter().run()"
              :disabled="!editor.can().addColumnAfter()"
              class="btn btn-outline-secondary btn_tiptap btn_table"
            >
              Столбец после
            </button>






            <button
              @click="editor.chain().focus().addRowBefore().run()"
              :disabled="!editor.can().addRowBefore()"
              class="btn btn-outline-secondary btn_tiptap btn_table"
            >
              Добавить ряд до
            </button>

            <button
              @click="editor.chain().focus().addRowAfter().run()"
              :disabled="!editor.can().addRowAfter()"
              class="btn btn-outline-secondary btn_tiptap btn_table"
            >
              Добавить ряд после
            </button>
<hr class="dropdown-divider" />





            <button
              @click="editor.chain().focus().mergeCells().run()"
              :disabled="!editor.can().mergeCells()"
              class="btn btn-outline-secondary btn_tiptap btn_table"
            >
              Соединить ячейки
            </button>
            <button
              @click="editor.chain().focus().splitCell().run()"
              :disabled="!editor.can().splitCell()"
              class="btn btn-outline-secondary btn_tiptap btn_table"
            >
              Разьединить ячейки
            </button>
            <button
              @click="editor.chain().focus().toggleHeaderColumn().run()"
              :disabled="!editor.can().toggleHeaderColumn()"
              class="btn btn-outline-secondary btn_tiptap btn_table"
            >
              Заголовок столбца
            </button>

            <button
              @click="editor.chain().focus().toggleHeaderRow().run()"
              :disabled="!editor.can().toggleHeaderRow()"
              class="btn btn-outline-secondary btn_tiptap btn_table"
            >
              Заголовок ряда
            </button>




            <button
              @click="editor.chain().focus().toggleHeaderCell().run()"
              :disabled="!editor.can().toggleHeaderCell()"
              class="btn btn-outline-secondary btn_tiptap btn_table"
            >
              Заголовок ячейки
            </button>
            <hr class="dropdown-divider" />
            <button
              @click="editor.chain().focus().mergeOrSplit().run()"
              :disabled="!editor.can().mergeOrSplit()"
              class="btn btn-outline-secondary btn_tiptap btn_table"
            >
              Ячейка по умолчанию
            </button>
            <button
              @click="
                editor
                  .chain()
                  .focus()
                  .setCellAttribute('backgroundColor', '#FAF594')
                  .run()
              "
              :disabled="
                !editor.can().setCellAttribute('backgroundColor', '#FAF594')
              "
              class="btn btn-outline-secondary btn_tiptap btn_table"
            >
              Атрибут ячейки
            </button>

            <button
              @click="editor.chain().focus().goToNextCell().run()"
              :disabled="!editor.can().goToNextCell()"
              class="btn btn-outline-secondary btn_tiptap btn_table"
            >
              К следующей ячейки
            </button>
            <button
              @click="editor.chain().focus().goToPreviousCell().run()"
              :disabled="!editor.can().goToPreviousCell()"
              class="btn btn-outline-secondary btn_tiptap btn_table"
            >
              К предыдущей ячейки
            </button>
                  <button
              @click="editor.chain().focus().fixTables().run()"
              :disabled="!editor.can().fixTables()"
              class="btn btn-outline-secondary btn_tiptap btn_table"
            >
              Исправление таблицы
            </button>
             <hr class="dropdown-divider" />
            <button
              @click="editor.chain().focus().deleteColumn().run()"
              :disabled="!editor.can().deleteColumn()"
              class="btn btn-outline-secondary btn_tiptap btn_table"
            >
              Удалить столбец
            </button>

                        <button
              @click="editor.chain().focus().deleteRow().run()"
              :disabled="!editor.can().deleteRow()"
              class="btn btn-outline-secondary btn_tiptap btn_table"
            >
              Удалить ряд
            </button>
                        <button
              @click="editor.chain().focus().deleteTable().run()"
              :disabled="!editor.can().deleteTable()"
              class="btn btn-outline-secondary btn_tiptap btn_table"
            >
              Удалить таблицу
            </button>



                    </div>
                    <!-- <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->
                  </div>
                </div>
              </div><!-- End Vertically centered Modal-->
<hr>
  </div>

</template>

<script>
export default {
  props: {
    editor: {
      type: Object,
      default: null,
    },
  },
};
</script>

<style scoped>
@import "~bootstrap/dist/css/bootstrap.css";
.btn_table {
  width: 150px;
  height: 60px;
}
.btn_tiptap {
  border: none !important;
}

.btn-link {
  text-decoration: none !important;
  color: #6c757d !important;
}
.line {
  height: 100px;
  border-right: 1px solid #6c757d;
  padding-right: 10px;
  margin-right: 10px;
}
</style>

<style lang="scss">
/* Basic editor styles */
.ProseMirror {
  margin: 1rem 0;

  > * + * {
    margin-top: 0.75em;
  }

  ul,
  ol {
    padding: 0 1rem;
  }

  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    line-height: 1.1;
  }

  code {
    background-color: rgba(#616161, 0.1);
    color: #616161;
  }

  pre {
    background: #0d0d0d;
    color: #fff;
    font-family: "JetBrainsMono", monospace;
    padding: 0.75rem 1rem;
    border-radius: 0.5rem;

    code {
      color: inherit;
      padding: 0;
      background: none;
      font-size: 0.8rem;
    }
  }

  img {
    max-width: 100%;
    height: auto;
  }

  blockquote {
    padding-left: 1rem;
    border-left: 2px solid rgba(#0d0d0d, 0.1);
  }

  hr {
    border: none;
    border-top: 2px solid rgba(#0d0d0d, 0.1);
    margin: 2rem 0;
  }
}

/* Table-specific styling */
.ProseMirror {
  table {
    border-collapse: collapse;
    table-layout: fixed;
    width: 100%;
    height: 100%;
    margin: 0;
    overflow: hidden;

    td,
    th {
      min-width: 1em;
      border: 2px solid #ced4da;
      padding: 3px 5px;
      vertical-align: top;
      box-sizing: border-box;
      position: relative;

      > * {
        margin-bottom: 0;
      }
    }

    th {
      font-weight: bold;
      text-align: left;
      background-color: #f1f3f5;
    }

    .selectedCell:after {
      z-index: 2;
      position: absolute;
      content: "";
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
      background: rgba(200, 200, 255, 0.4);
      pointer-events: none;
    }

    .column-resize-handle {
      position: absolute;
      right: -2px;
      top: 0;
      bottom: -2px;
      width: 4px;
      background-color: #adf;
      pointer-events: none;
    }

    p {
      margin: 0;
    }
  }
}

.tableWrapper {
  overflow-x: auto;
}

.resize-cursor {
  cursor: ew-resize;
  cursor: col-resize;
}
mark {
  background-color: #faf594;
}
</style>
