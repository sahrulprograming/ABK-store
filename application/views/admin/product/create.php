<div class="m-3">
    <h2>Create Product</h2>
</div>

<div class="card shadow">
    <form action="<?= current_url(); ?>" class="card-body m-4" method="post" enctype="multipart/form-data">
        <div class="input-image mb-3">
            <label for="" class="mb-2">Upload Image</label>
            <div class="preview-image" onclick="uploadImage()">
                <div class="icon d-flex align-items-center justify-content-center <?= set_value('pathImage') ? 'd-none' : ''; ?>" style="height:100%;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-camera-fill" viewBox="0 0 16 16">
                        <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                        <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z" />
                    </svg>
                </div>
                <img src="<?= set_value('pathImage'); ?>" alt="" class="<?= set_value('pathImage') ? '' : 'd-none'; ?>" id="product_image">
            </div>
            <input type="file" name="image" class="d-none">
            <input type="text" name="pathImage" class="d-none" value="<?= set_value('pathImage'); ?>">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" value="<?= set_value('title'); ?>" class="form-control" name="title" id="title" placeholder="input title" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category" id="category" required aria-label="Default select example">
                <option selected>Select One</option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category->cat_id; ?>" <?= set_value('category') == $category->cat_id ? 'selected' : ''; ?>><?= $category->cat_title; ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <select class="form-select" name="brand" id="brand" required aria-label="Default select example">
                <option selected>Select One</option>
                <?php foreach ($brands as $brand) : ?>
                    <option value="<?= $brand->brand_id; ?>" <?= set_value('brand') == $brand->brand_id ? 'selected' : ''; ?>><?= $brand->brand_title; ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" value="<?= set_value('price'); ?>" class="form-control" name="price" id="price" placeholder="input price" required>
        </div>
        <div class="mb-3">
            <label for="keywords" class="form-label">Keywords</label>
            <input type="text" value="<?= set_value('keywords'); ?>" class="form-control" name="keywords" id="keywords" placeholder="input keywords" required>
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Description</label>
            <style>
                .ck-editor__editable {
                    min-height: 200px;
                }
            </style>
            <textarea name="desc" id="desc" placeholder="Description"></textarea>
        </div>
        <div class="mb-4 text-center">
            <button type="submit" class="btn btn-primary px-5 py-2">Simpan</button>
        </div>
    </form>
</div>
<script type="text/javascript">
    ClassicEditor
        .create(document.querySelector('#desc'), {
            toolbar: {
                items: [
                    'heading', '|',
                    'alignment', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                    'link', '|',
                    'bulletedList', 'numberedList',
                ]
            }
        })
        .catch(error => {
            console.error(error);
        });
    const uploadImage = () => {
        $('input[name="image"]').click()
    }
    $('input[name="image"]').on('change', function() {
        const imgPreview = document.querySelector('#product_image');
        imgPreview.classList.remove('d-none')
        $('.icon').addClass('d-none')
        const ofReader = new FileReader();
        ofReader.readAsDataURL($(this)[0].files[0]);
        ofReader.onload = function(ofREvent) {
            $('input[name="pathImage"]').val(ofREvent.target.result)
            imgPreview.src = ofREvent.target.result
        }
    })
</script>