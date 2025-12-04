tinymce.init({
  selector: "#tinymce-editor",
  height: 500,
  plugins: "image link lists media table code",
  toolbar:
    "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image link media | table | code",

  automatic_uploads: true,
  images_upload_url: "/tinymce-upload",

  images_upload_handler: function (blobInfo, progress) {
    return new Promise((resolve, reject) => {
      const xhr = new XMLHttpRequest();
      xhr.withCredentials = false;
      xhr.open("POST", "/tinymce-upload");

      const token = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
      xhr.setRequestHeader("X-CSRF-TOKEN", token);

      xhr.upload.onprogress = (e) => progress((e.loaded / e.total) * 100);

      xhr.onload = function () {
        if (xhr.status < 200 || xhr.status >= 300) {
          reject("HTTP Error: " + xhr.status);
          return;
        }

        const json = JSON.parse(xhr.responseText);
        if (!json.location) {
          reject("Invalid response: " + xhr.responseText);
          return;
        }

        resolve(json.location);
      };

      xhr.onerror = function () {
        reject("Image upload failed due to network error");
      };

      const formData = new FormData();
      formData.append("file", blobInfo.blob(), blobInfo.filename());
      xhr.send(formData);
    });
  },

  file_picker_callback: function (callback, value, meta) {
    if (meta.filetype !== "image") return;

    const input = document.createElement("input");
    input.type = "file";
    input.accept = "image/*";

    input.onclick = function () {
      this.value = null;
    };

    input.onchange = function () {
      const file = this.files[0];
      if (!file) return;

      const reader = new FileReader();
      reader.onload = function (e) {
        callback(e.target.result, { alt: file.name, title: file.name });
      };
      reader.readAsDataURL(file);
    };

    input.click();
  },

  images_replace_blob_uris: true,
  paste_data_images: true,
});
