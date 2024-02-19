<?php require 'partials/header.php'; ?>
<?php require 'partials/adminMenu.php'; ?>
<?php $category=$database->selectALL('category');?>
<?php $post=$database->selectALL('blogs') ?>
<section class="p-10 space-y-10 ml-80">
    <div class="flex justify-between mt-7">
        <h1 class="sm:text-2xl sm:font-bold">All Blogs</h1>
        <div class="space-x-2 flex ">
            <a href="/blog/admin/add-blog"
                class="bg-gray-400 text-white h-10 items-center flex justify-center px-5 rounded-lg">ADD BLOG</a>
            <a href="/blog/admin/add-category" name="add_category"
                class="bg-gray-400 text-white h-10 items-center flex justify-center px-5 rounded-lg">ADD
                CATEGORY</a>
        </div>
    </div>
    <div class="space-y-10">
    <ul class="flex gap-5">
        <?php foreach ($category as $key => $value) :?>
            <li>
                <form action="/blog/admin/category" method="get">
                    <button name="<?=$value['id']?>"><?=$value['category']?></button>
                </form>
            </li>
            <?php endforeach;?>
        </ul>
    <ul>
       
    <?php if (isset($post)): ?>
        <?php foreach ($post as $key => $value): ?>
            <section class="mt-10">
                <div class="border flex p-5 gap-10 justify-between">
                    <div class="flex p-5 gap-10 ">
                        <img src="../public/blog/<?= $value["post"] ?>" alt="" class="h-46 w-40">
                        <div class="space-y-5 flex flex-col justify-between">
                            <h2 class="text-4xl hover:text-blue-700">
                                <?= $value["title"] ?>
                            </h2>
                            <p class="hover:text-blue-700">(
                                <?= $value["author"] ?>)
                            </p>
                            <p class="text-xl hover:text-blue-600">
                                <?= $value["content"] ?>
                            </p>
                            <div class=""><time>
                                    <?= $value["publish_date"] ?>
                                </time></div>
                        </div>
                    </div>
                    <div class="flex gap-5">
                        <form method="post" action="update-blog?<?= $value['id']; ?>" class="">
                            <button name="update"
                                class="bg-green-700 text-white h-8 items-center flex justify-center px-5 rounded-full">Update</button>
                        </form>
                        <form method="post" action="adminController?<?= $value['id'];?>" class="">
                            <button name="delete"
                                class="bg-red-800 text-white h-8 items-center flex justify-center px-5 rounded-full">Delete</button>
                        </form>
                    </div>
                </div>
            </section>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
</section>
<?php require 'partials/footer.php'; ?>