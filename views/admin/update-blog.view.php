<?php require 'partials/header.php'; ?>
<?php require 'partials/adminMenu.php'; ?>
<?php $categories=$database->selectALL('category'); ?>
<?php $id=array_keys($_GET); ?>
<?php $data=$database->select('blogs','id',$id[0]); ?>

<main class="ml-80">
    <section class="flex flex-col items-center justify-center pt-24 py-10 px-80">
        <h1 class="bg-gray-200 text-4xl font-bold text-center w-full py-5 border-b border-gray-400">UPDATE BLOG</h1>
        <?php foreach ($data as $key => $value) :?>
        <form action="/blog/admin/adminController?<?=$id[0]?>" method="post" enctype="multipart/form-data"
            class="border bg-gray-200 px-5 py-10 w-full grid grid-cols-2 gap-10 text-lg">
            <div class="flex flex-col col-span-2">
                <label for="title">Title</label>
                <input type="text" name="title" id="title"
                    class="p-2  h-10  border-b outline-none"
                    value="<?=$value['title']?>">
                <span class="text-red-500 text-sm">
                <?php if(isset($_GET['TitleError'])){
                    echo $_GET['TitleError'];} ?>
                </span>
            </div>
            
            <div class="flex flex-col">
                <label for="author">Author</label>
                <input type="text" name="author" id="author"
                    class="p-2 h-10  border-b outline-none "
                    value="<?=$value['author']?>">
                <span class="text-red-500 text-sm">
                <?php if(isset($_GET['AuthorError'])){
                    echo $_GET['AuthorError'];} ?>
                </span>
            </div>
            <div class="flex flex-col">
                <label for="category">Category</label>
                <select name="category" id="category"
                    class="  h-10 p-2 h-10  border-b outline-none"
                    value="">
                    <option value="none" selected disabled hidden>Select Blog category</option>
                    <?php foreach (array_column($categories,'category') as $category=>$val):?>
                    <?php
                        var_dump($val);
                        if ($value == 'None') {
                            continue;
                        }
                        echo "<option value=\"$val\">$val</option>";
                    ?>
                    <?php endforeach; ?>
                </select>
                <span class="text-red-500 text-sm">
                <?php if(isset($_GET['CategoryError'])){
                    echo $_GET['CategoryError'];} ?>
                </span>

            </div>

            <div class="flex flex-col col-span-2">
                <label for="content">Content</label>
                <textarea name="content" id="content"
                    class="p-2  border outline-none " cols="30"
                    rows="5"> <?=$value['content']?></textarea>
                <span class="text-red-500 text-sm">
                <?php if(isset($_GET['ContentError'])){
                    echo $_GET['ContentError'];} ?>
                </span>
                </span>

            </div>

            <div class="flex flex-col col-span-2">
                <input type="file" name="post" id="post" aria-labelledby="post"
                    class="rounded-lg h-10 outline-none">
                    <?=$value['post']?>
                <span class="text-red-500 text-sm">
                <?php if(isset($_FILES['post']["name"])){
                    echo $_FILES['post']["name"];} ?>
                </span>
            </div>
            <div class="flex flex-col col-span-2">
                <input type="submit" name="update-blog" id="update-blog" value="Update"
                    class="rounded-lg h-10 text-black bg-gray-400 outline-none">
            </div>
        </form>
        <?php endforeach; ?>
    </section>
</main>
<?php require 'partials/footer.php'; ?>