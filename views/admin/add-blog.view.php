<?php require 'partials/header.php'; ?>
<?php require 'partials/adminMenu.php'; ?>
<?php $categories=$database->selectALL('category'); ?>
<main class="ml-80">
    <section class="flex flex-col items-center justify-center pt-24 py-10 px-80">
        <h1 class="bg-gray-200 text-4xl font-bold text-center w-full py-5 border-b border-gray-400">ADD NEW BLOG</h1>
        <form action="/blog/admin/adminController" method="post" enctype="multipart/form-data"
            class="border bg-gray-200 px-5 py-10 w-full grid grid-cols-2 gap-10 text-lg">
            <div class="flex flex-col col-span-2">
                <label for="title">Title</label>
                <input type="text" name="title" id="title"
                    class="p-2  h-10  border-b outline-none"
                    value="">
                <span class="text-red-500 text-sm">
                    
                </span>
            </div>
            
            <div class="flex flex-col">
                <label for="author">Author</label>
                <input type="text" name="author" id="author"
                    class="p-2 h-10  border-b outline-none "
                    value="">
                <span class="text-red-500 text-sm">
                    
                </span>

            </div>
            <div class="flex flex-col">
                <label for="category">Category</label>
                <select name="category" id="category"
                    class="  h-10 p-2 h-10  border-b outline-none"
                    value="">
                    <option value="none" selected disabled hidden>Select Blog category</option>
                    <?php
                    foreach (array_column($categories,'category') as $category=>$value) {
                        var_dump($value);
                        if ($value == 'None') {
                            continue;
                        }
                        echo "<option value=\"$value\">$value</option>";
                        echo '';
                    }
                    ?>
                </select>
                <span class="text-red-500 text-sm">
                    
                </span>

            </div>

            <div class="flex flex-col col-span-2">
                <label for="content">Content</label>
                <textarea name="content" id="content"
                    class="p-2  border outline-none " cols="30"
                    rows="5"></textarea>
                <span class="text-red-500 text-sm">
                    
                </span>

            </div>

            <div class="flex flex-col col-span-2">
                <input type="file" name="post" id="post" aria-labelledby="post"
                    class="rounded-lg h-10 outline-none">
                <span class="text-red-500 text-sm">
                    
                </span>
            </div>
            <div class="flex flex-col col-span-2">
                <input type="submit" name="add-blog" id="add-blog" value="Publish"
                    class="rounded-lg h-10 text-black bg-gray-400 outline-none">
            </div>
        </form>
    </section>
</main>
<?php require 'partials/footer.php'; ?>