<?php require 'partials/header.php'; ?>
<?php require 'partials/adminMenu.php'; ?>
<?php $category = $database->selectALL('category') ?>
<h2 Class="text-center text-4xl py-20 ml-80 font-bold">ALL CATEGORIES</h2>
<ul class="flex gap-5 grid grid-cols-3 gap-5 ml-80 p-20 ">

    <?php foreach ($category as $key => $value): ?>
        <li class="bg-red-100 flex flex-col items-center py-10 gap-10">
            <form action="/blog/admin/category" method="get">
                <button name="<?= $value['id'] ?>" class="border px-40 text-3xl ">
                    <?= $value['category'] ?>
                </button>
            </form>
            <div class="flex gap-5">
                <form method="post" action="update-category?<?= $value['id']; ?>" class="">
                    <button name="update-category"
                        class="bg-green-700 text-white h-8 items-center flex justify-center px-5 rounded-full">Update</button>
                </form>
                <form method="post" action="adminController?<?= $value['id']; ?>" class="">
                    <button name="delete-category"
                        class="bg-red-800 text-white h-8 items-center flex justify-center px-5 rounded-full">Delete</button>
                </form>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
<ul>
    <?php require 'partials/footer.php'; ?>