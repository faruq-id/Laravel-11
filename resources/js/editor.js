// UUPLAOD IMAGES TEXT EDITOR
const ImageLocalUploadHandler = (blobInfo, progress) => new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest();
    xhr.withCredentials = false;
    xhr.open('POST', '/tinydrive/local-upload-image'); // Endpoint Laravel untuk upload gambar
  
    // Pastikan meta tag ditemukan
    const csrfToken = document.querySelector('meta[name="csrf-token"]');
    if (csrfToken) {
        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken.getAttribute('content'));
    } else {
        console.error('Meta CSRF token tidak ditemukan di halaman.');
        reject('CSRF token tidak ditemukan.');
        return;
    }
    
    xhr.upload.onprogress = (e) => {
        progress(e.loaded / e.total * 100); // Menangani progress bar upload
    };
  
    xhr.onload = () => {
        if (xhr.status === 403) {
            reject({ message: 'HTTP Error: ' + xhr.status, remove: true });
            return;
        }
  
        if (xhr.status < 200 || xhr.status >= 300) {
            reject('HTTP Error: ' + xhr.status);
            return;
        }
  
        const json = JSON.parse(xhr.responseText);
  
        if (!json || typeof json.location != 'string') {
            reject('Invalid JSON: ' + xhr.responseText);
            return;
        }
  
        resolve(json.location); // URL gambar yang berhasil diunggah
    };
  
    xhr.onerror = () => {
        reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
    };
  
    const formData = new FormData();
    formData.append('file', blobInfo.blob(), blobInfo.filename());
  
    xhr.send(formData);
});


// tinydrive
const getJwtTokenTinydrive = () => new Promise((resolve) => {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/tinydrive/token');
    
    // Sertakan CSRF token di header
    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
    
    xhr.onload = function () {
        const json = JSON.parse(xhr.responseText);
        resolve(json.token);
    };

    xhr.send();
});

// costueme LINK (link list)
const fetchLinkList = () => [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'https://about.tiny.cloud' }
];


    // Konfigurasi TinyMCE
    const tinymceConfig = {
        selector: 'textarea#editor',
        // plugins: 'code table advlist autolink lists link image charmap print preview hr anchor pagebreak help',
        // plugins: 'tinydrive editimage tableofcontents autocorrect tinymcespellchecker permanentpen pageembed mergetags exportpdf importword math footnotes casechange checklist print preview typography fullpage paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table advtable charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount spellchecker imagetools textpattern noneditable help charmap quickbars emoticons accordion advcode',
        plugins: 'a11ychecker tinydrive editimage tableofcontents autocorrect tinymcespellchecker permanentpen pageembed mergetags footnotes casechange checklist preview typography importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table advtable charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons accordion advcode',
        statusbar: true, //(false/true) hide show status bar bawah
        elementpath: true, //(false/true) hide show elemet pasth code ex: table > tbody > tr > td > p
        branding: false, //menampilkan logo tinymce
        resize: true, //(true, false, 'both') resize text editor
        highlight_on_focus: true, //(true/false) menambahkan garis luar biru ke editor 
        // iframe_aria_text: 'Text Editor',
        // help_accessibility: true,
        tinydrive_token_provider: getJwtTokenTinydrive, // Endpoint Laravel
        tinydrive_upload_path: '/storage/uploads/images',
        tinydrive_max_image_dimension: 1024,
        tinydrive_skin: 'oxide-dark',
        // tinydrive_token_provider_method: 'GET', // Gunakan GET sebagai metode HTTP
        autocorrect_capitalize: true,
        // TOLBAR (toolbar)
        toolbar_mode: 'sliding', //floating', 'sliding', 'scrolling', or 'wrap'
        toolbar_location: 'auto', //'auto', 'top', 'bottom'
        toolbar_sticky: true,
        toolbar_sticky_offset: 67,
        // toolbar_persist: false, untuk tag DIV
        // fixed_toolbar_container: '#mytoolbar',
        toolbar_drawer: 'sliding',
        // toolbar: 'code | undo redo | styles | blocks fontfamily fontsize align lineheight | forecolor backcolor | copy cut paste pasteText selectAll | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        // toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | outdent indent',
        // toolbar: 'code | undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile quickimage image media template link checklist anchor codesample | typography ltr rtl',
        toolbar: 'code | undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | align | outdent indent | numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile quickimage image media template link checklist anchor codesample | typography ltr rtl | help',
        // toolbar: [
        //     'code | undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | align | outdent indent | numlist bullist | forecolor backcolor removeformat | link insertfile quickimage image media template anchor codesample | pagebreak | charmap emoticons |  preview save print fullscreen | checklist typography ltr rtl'
        // ],
        // toolbar1: 'undo redo | styles | bold italic | link image',
        // toolbar2: 'alignleft aligncenter alignright',
        // toolbar: 'formatting | alignleft aligncenter alignright',
        // toolbar_groups: {
        //     formatting: {
        //     icon: 'bold',
        //     tooltip: 'Formatting',
        //     items: 'bold italic underline | superscript subscript'
        //     }
        // },
        // toolbar: 'undo redo styles bold italic alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
        // ADVANCE (advcode)
        advcode_inline: true, //advcode mode edit kode (tanpa di buka di popup)
        advcode_prettify_editor: true, // advcode default value 
        typography_default_lang: [ "en-US" ], //typography Required to set specific typography language rules.
        codesample_global_prismjs: true, //codesample
        // exportpdf_converter_options: { //exportpdf (premium)
        //     format: 'A4',
        //     margin_top: '1in',
        //     margin_right: '1in',
        //     margin_bottom: '1in',
        //     margin_left: '1in'
        // },
        // codesample_languages: [ //codesample
        //     { text: 'HTML/XML', value: 'markup' },
        //     { text: 'JavaScript', value: 'javascript' },
        //     { text: 'CSS', value: 'css' },
        //     { text: 'PHP', value: 'php' },
        //     { text: 'Ruby', value: 'ruby' },
        //     { text: 'Python', value: 'python' },
        //     { text: 'Java', value: 'java' },
        //     { text: 'C', value: 'c' },
        //     { text: 'C#', value: 'csharp' },
        //     { text: 'C++', value: 'cpp' }
        // ],
        // typography_ignore: [ 'code', 'span["lang"]' ],
        height: 807,
        // AUTOSAVE (autosave)
        autosave_ask_before_unload: true, // Konfirmasi sebelum meninggalkan halaman dengan perubahan yang belum disimpan
        autosave_interval: "30s", // Autosave setiap 30 detik
        autosave_prefix: "{path}{query}-{id}-", // Menetapkan format nama kunci autosave
        autosave_restore_when_empty: false, // Jangan pulihkan autosave saat editor kosong
        autosave_retention: "2m", // Retensi data autosave selama 2 menit
        a11y_advanced_options: true,
        image_title: true,
        file_picker_types: 'file image media', //'file image media'
        /* and here's our custom image picker*/
        file_picker_callback: (cb, value, meta) => {
            const input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            input.addEventListener('change', (e) => {
            const file = e.target.files[0];

            const reader = new FileReader();
            reader.addEventListener('load', () => {
                /*
                Note: Now we need to register the blob in TinyMCEs image blob
                registry. In the next release this part hopefully won't be
                necessary, as we are looking to handle it internally.
                */
                const id = 'blobid' + (new Date()).getTime();
                const blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                const base64 = reader.result.split(',')[1];
                const blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);

                /* call the callback and populate the Title field with the file name */
                cb(blobInfo.blobUri(), { title: file.name });
            });
            reader.readAsDataURL(file);
            });

            input.click();
        },
        image_caption: true,
        image_description: true,
        image_dimensions: true,
        image_title: true,
        // image_prepend_url: 'https://www.example.com/images/', //Pilihan ini memungkinkan Anda menentukan awalan URL yang akan diterapkan ke gambar bila diperlukan.
        image_list: [
            { title: 'Logo', value: 'logo.png' },
            { title: 'More',
              menu: [
                { title: 'Logo backend', value: 'logo-backend.jpg' },
                { title: 'Logo frontend', value: 'logo-frontend.png' },
                { title: 'Logo lainnya', value: 'logo-lainnya.gif' }
              ]
            }
        ],
        image_class_list: [
            { title: 'None', value: '' },
            { title: 'No border', value: '' },
            { title: 'Borders',
              menu: [
                { title: 'Black border', value: 'border-2 border-black rounded-md p-1' },
                { title: 'White border', value: 'border-2 border-white rounded-md p-1' },
                { title: 'Green border', value: 'border-2 border-gray-500 rounded-md p-1' },
                { title: 'Blue border', value: 'border-2 border-blue-500 rounded-md p-1' },
                { title: 'Green border', value: 'border-2 border-green-500 rounded-md p-1' },
                { title: 'Yellow border', value: 'border-2 border-yellow-500 rounded-md p-1' },
                { title: 'Sky border', value: 'border-2 border-sky-500 rounded-md p-1' },
                { title: 'Purple border', value: 'border-2 border-purple-500 rounded-md p-1' },
                { title: 'Pink border', value: 'border-2 border-pink-500 rounded-md p-1' },
                { title: 'Rose border', value: 'border-2 border-rose-500 rounded-md p-1' },
                { title: 'Red border', value: 'border-2 border-red-500 rounded-md p-1' }
              ]
            }
        ],
        image_uploadtab: true,
        images_file_types: 'jpg,jpg,png,webp', //Default value: 'jpeg,jpg,jpe,jfi,jif,jfif,png,gif,bmp,webp'
        images_upload_base_path: '/uploads/images/', // tempat image akan di upploads
        images_upload_credentials: true,
        image_advtab: true,
        automatic_uploads: true, /* enable automatic uploads of images represented by blob or data URIs*/
        images_upload_handler: ImageLocalUploadHandler,
        object_resizing: true,// object_resizing: 'img', table dll
        resize_img_proportional: true, // true = mengunci perubahan dimensi gambar, harus sesuai gambar yang ada, false = bisa merubah secara bebas
        imagetools_cors_hosts: ['picsum.photos'],
        quickbars_selection_toolbar: 'copy cut paste pasteText | forecolor backcolor | bold italic underline strikethrough | quicklink h2 h3 blockquote quickimage quicktable',
        // noneditable_noneditable_class: "mceNonEditable",
        // spellchecker_dialog: true,
        // spellchecker_whitelist: ['Ephox', 'Moxiecode'],
        // content_style: ".mymention{ color: green; }",
        contextmenu: "configurepermanentpen link image imagetools table",
        contextmenu_avoid_overlap: '.mce-spelling-word',
        // content_style: '.mce-annotation { background: #fff0b7; } .tc-active-annotation {background: #ffe168; color: black; }',
        typeahead_urls: true,
        menubar: true,
        // menubar: 'file edit view insert format tools table help',
        details_initial_state: 'expanded', //(accordion) inherited, collapsed, expanded
        details_serialized_state: 'collapsed', //(accordion)
        fullscreen_native: true, //(fullscreen)
        help_accessibility: true, //(help)
        // insertdatetime_formats: [ '%H:%M:%S', '%Y-%m-%d', '%I:%M:%S %p', '%D' ],
        // LINK
        link_default_target: '_blank', //(link)
        link_default_protocol: 'http',
        link_assume_external_targets: 'https', //(link), value = true, false, 'http', 'https'
        link_context_toolbar: true,
        link_title: true,
        link_quicklink: true,
        link_target_list: [
            { title: 'None', value: '' },
            { title: 'Same page', value: '_self' },
            { title: 'New page', value: '_blank' },
            { title: 'Parent frame', value: '_parent' }
        ],
        link_rel_list: [
            { title: 'No Referrer', value: 'noreferrer' },
            { title: 'External Link', value: 'external' }
          ],
        link_class_list: [
            { title: 'None', value: '' },
            { title: 'External Link', value: 'text-blue-700' },
            { title: 'Default Link', value: 'text-blue-700' },
            { title: 'Internal Support Link', value: 'text-purple-700' },
            { title: 'Internal Marketing Link', value: 'text-green-700' },
            { title: 'Other Internal Link', value: 'text-red-700' } 
        ],
        link_list: (success) => { // called on link dialog open
            const links = fetchLinkList(); // get link_list data
            success(links); // pass link_list data to {productname}
        },
        // link_list: [
        //     { title: '{companyname} Home Page', value: '{companyurl}' },
        //     { title: '{companyname} Blog', value: '{companyurl}/blog' },
        //     { title: '{productname} Support resources',
        //       menu: [
        //         { title: '{productname} Documentation', value: '{companyurl}/docs/' },
        //         { title: '{productname} on Stack Overflow', value: '{communitysupporturl}' },
        //         { title: '{productname} GitHub', value: 'https://github.com/tinymce/' }
        //       ]
        //     }
        // ],
        // HELP
        // help_tabs: [
        //     'shortcuts', // the default shortcuts tab
        //     'keyboardnav', // the default keyboard navigation tab
        //     'plugins', // the default plugins tab
        //     {
        //       name: 'custom1', // new tab called custom1
        //       title: 'Custom Tab 1',
        //       items: [
        //         {
        //           type: 'htmlpanel',
        //           html: '<p>This is a custom tab</p>',
        //         }
        //       ]
        //     },
        //     {
        //       name: 'versions', // override the default versions tab
        //       title: 'Custom Versions',
        //       items: [
        //         {
        //           type: 'htmlpanel',
        //           html: 'This is a custom versions panel.'
        //         }
        //       ]
        //     },
        //     'custom2', // new tab custom2 as defined on init in setup() below
        //     'custom3' // new tab custom3 as defined on button click in setup() below
        // ],
        // setup: (editor) => {
        //     // on editor init, add a tab called custom2
        //     editor.on('init', () => {
        //       editor.plugins.help.addTab({
        //         name: 'custom2',
        //         title: 'Custom Tab 2',
        //         items: [
        //           {
        //             type: 'htmlpanel',
        //             html: '<p>This is another custom tab</p>',
        //           }
        //         ]}
        //       );
        //     });
        
        //     // add a toolbar button that when clicked adds a tab called custom3
        //     editor.ui.registry.addButton('addTab', {
        //       text: 'Add tab',
        //       onAction: () => {
        //         editor.plugins.help.addTab({
        //           name: 'custom3',
        //           title: 'Custom Tab 3',
        //           items: [
        //             {
        //               type: 'htmlpanel',
        //               html: '<p>This is yet another custom tab</p>',
        //             }
        //           ]
        //         });
        //       }
        //     });
        // },
        // MEDIA
        media_alt_source: true, //text alternatif media
        media_dimensions: true, //pengaturan dimensi
        media_filter_html: true, //filter xxs video
        media_live_embeds: true, //pemutaran media embed di form text editor
        media_poster: true, //uppload media in computer
        audio_template_callback: (data) =>
            '<audio controls>\n' +
            `<source src="${data.source}"${data.sourcemime ? ` type="${data.sourcemime}"` : ''} />\n` +
            (data.altsource ? `<source src="${data.altsource}"${data.altsourcemime ? ` type="${data.altsourcemime}"` : ''} />\n` : '') +
            '</audio>',
        iframe_template_callback: (data) => `<iframe title="${data.title}" width="${data.width}" height="${data.height}" src="${data.source}"></iframe>`,
        video_template_callback: (data) =>
            `<video width="${data.width}" height="${data.height}"${data.poster ? ` poster="${data.poster}"` : ''} controls="controls">\n` +
            `<source src="${data.source}"${data.sourcemime ? ` type="${data.sourcemime}"` : ''} />\n` +
            (data.altsource ? `<source src="${data.altsource}"${data.altsourcemime ? ` type="${data.altsourcemime}"` : ''} />\n` : '') +
            '</video>',
        // pageembe
        tiny_pageembed_classes: [
            { text: 'Big embed', value: 'my-big-class' },
            { text: 'Small embed', value: 'my-small-class' }
        ],
        // permanentpen
        permanentpen_properties: {
            fontname: 'arial,helvetica,sans-serif',
            forecolor: '#E74C3C',
            fontsize: '12pt',
            hilitecolor: '',
            bold: true,
            italic: false,
            strikethrough: false,
            underline: false
        },
        // TABLE
        table_grid: true,
        table_advtab: true,
        table_cell_advtab: true,
        table_row_advtab: true,
        table_style_by_css: true,
        table_class_list: [
            { title: 'Default', value: '' },
            { title: 'No Borders', value: 'border-none' },
            { title: 'Red Borders', value: 'border border-red-500' },
            { title: 'Blue Borders', value: 'border border-blue-500' },
            { title: 'Green Borders', value: 'border border-green-500' },
            { title: 'Striped Rows', value: 'divide-y divide-gray-200' },
            { title: 'Hover Effect', value: 'hover:bg-gray-100' }
        ],
        table_cell_class_list: [
            { title: 'Default', value: '' },
            { title: 'No Borders', value: 'border-none' },
            { title: 'Red Borders', value: 'border border-red-500' },
            { title: 'Blue Borders', value: 'border border-blue-500' },
            { title: 'Green Borders', value: 'border border-green-500' },
            { title: 'Striped Rows', value: 'divide-y divide-gray-200' },
            { title: 'Hover Effect', value: 'hover:bg-gray-100' }
        ],
        table_row_class_list: [
            { title: 'Default', value: '' },
            { title: 'No Borders', value: 'border-none' },
            { title: 'Red Borders', value: 'border border-red-500' },
            { title: 'Blue Borders', value: 'border border-blue-500' },
            { title: 'Green Borders', value: 'border border-green-500' },
            { title: 'Striped Rows', value: 'divide-y divide-gray-200' },
            { title: 'Hover Effect', value: 'hover:bg-gray-100' }
        ],
        table_border_widths: [
            { title: 'small', value: '1px' },
            { title: 'medium', value: '3px' },
            { title: 'large', value: '5px' },
        ],
        table_background_color_map: [
            { title: 'Red', value: 'FF0000' },
            { title: 'White', value: 'FFFFFF' },
            { title: 'Yellow', value: 'F1C40F' }
        ],
        // table_border_styles: [
        //     { title: 'Solid', value: 'solid' },
        //     { title: 'Dotted', value: 'dotted' },
        //     { title: 'Dashed', value: 'dashed' },
        //     { title: 'Double', value: 'double' },
        //     { title: 'Groove', value: 'groove' },
        //     { title: 'Ridge', value: 'ridge' },
        //     { title: 'Inset', value: 'inset' },
        //     { title: 'Outset', value: 'outset' },
        //     { title: 'None', value: 'none' },
        //     { title: 'Hidden', value: 'hidden' }
        // ],
        menu: {
            file: { title: 'File', items: 'newdocument restoredraft | preview | importword exportpdf exportword | print | deleteallconversations' },
            edit: { title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall | searchreplace' },
            view: { title: 'View', items: 'code revisionhistory | visualaid visualchars visualblocks | spellchecker | preview fullscreen | showcomments' },
            insert: { title: 'Insert', items: 'image link media addcomment pageembed codesample inserttable | math | charmap emoticons hr accordion | pagebreak nonbreaking anchor tableofcontents | insertdatetime footnotes footnotesupdate' },
            format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript codeformat permanentpen configurepermanentpen | styles casechange blocks fontfamily fontsize align lineheight | forecolor backcolor | language | removeformat' },
            tools: { title: 'Tools', items: 'spellchecker spellcheckerlanguage spellcheckdialog | a11ycheck code wordcount' },
            table: { title: 'Table', items: 'inserttable | cell row column | advtablesort | advtablerownumbering tableprops deletetable' },
            help: { title: 'Help', items: 'help' }
        },
        setup: (editor) => {
            editor.on('init', () => {
                // Tambahkan kelas pada container untuk menyesuaikan UI Tailwind
                editor.getContainer().classList.add(
                    'bg-gray-50',
                    'border',
                    'border-gray-300',
                    'rounded-lg',
                    'focus:ring-blue-500',
                    'dark:bg-gray-800',
                    'dark:border-gray-700'
                );
                // Tambahkan kelas pada konten editor untuk gaya teks
                editor.contentDocument.body.classList.add(
                    'prose',
                    'prose-lg',
                    'text-gray-700',
                    'leading-relaxed',
                    'dark:prose-invert',
                    'dark:text-gray-300'
                );
            });
            // editor.on('click', function (e) {
            //     const target = e.target;
            //     if (target.nodeName === 'IMG') {
            //       editor.execCommand('mceImage'); // Menampilkan dialog gambar saat klik
            //     }
            // });
        },
    };

    // Fungsi untuk inisialisasi ulang TinyMCE berdasarkan mode
    function reinitializeTinyMCE() {
        const isDarkMode = document.documentElement.classList.contains('dark');
        tinymce.init({
            ...tinymceConfig, // Spread konfigurasi dasar
            skin: isDarkMode ? 'oxide-dark' : 'oxide',
            content_css: isDarkMode ? 'dark' : 'default',
            content_style: `
                body {
                    font-family: 'Inter', sans-serif;
                    color: ${isDarkMode ? '#d1d5db' : '#4B5563'}; /* Tailwind text-gray-300 (dark) atau text-gray-700 (light) */
                    line-height: 1.75;
                    padding: 1rem;
                    background-color: ${isDarkMode ? '#1f2937' : '#ffffff'}; /* Tailwind bg-gray-800 (dark) atau bg-white (light) */
                }
                h1, h2, h3, h4, h5, h6 {
                    font-weight: 600;
                }
                p {
                    margin-bottom: 2rem;
                }
                ul, ol {
                    padding-left: 1.25rem;
                }
            `,
        });
    }

    // Inisialisasi awal TinyMCE
    reinitializeTinyMCE();

    // Pantau perubahan kelas pada elemen <html> untuk mendeteksi mode
    const observer = new MutationObserver(() => {
        const editorInstance = tinymce.get('editor');
        if (editorInstance) {
            editorInstance.destroy(); // Hapus editor jika sudah ada
        }
        reinitializeTinyMCE(); // Inisialisasi ulang editor
    });

    // Observe perubahan atribut pada elemen <html>
    observer.observe(document.documentElement, {
        attributes: true,
        attributeFilter: ['class'],
    });