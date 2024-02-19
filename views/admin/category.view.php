<?php require 'partials/header.php'; ?>
<?php require 'partials/adminMenu.php'; ?>
<?php $post = $database->select('blogs', 'category', array_key_first($_GET)); ?>
<?php $category = $database->select('category', 'id', array_key_first($_GET));?>
<?php $curruntCategory = array_column($category, 'category'); ?>
<?php $AllCategory=$database->selectALL('category') ?>

<div class="space-y-10 p-20 ml-80">
    <ul class="flex gap-5">
        <?php foreach ($AllCategory as $key => $value) :?>
            <li>
                <form action="/blog/admin/category" method="get">
                    <button name="<?=$value['id']?>"><?=$value['category']?></button>
                </form>
            </li>
            <?php endforeach;?>
        </ul>
    <ul>
    <h2 class="Font-semi-bold text-4xl underline">
        <?= $curruntCategory[0] ?> Blog Posts
    </h2>
    
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
                        <form method="post" action="adminController?<?= $value['id']; ?>" class="">
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
<?php require 'partials/footer.php'; ?>