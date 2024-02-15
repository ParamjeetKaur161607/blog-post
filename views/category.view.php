<?php require 'partials/header.php'; ?>
<?php require 'partials/navigation.php'; ?>
<?php $post = $database->select('blogs', 'category', array_key_first($_GET)); ?>
<?php $category = $database->select('category', 'id', array_key_first($_GET));?>
<?php $curruntCategory=array_column($category,'category');?>

<div class="space-y-10 p-10">
    <h2 class="text-center Font-semi-bold text-4xl underline"><?= $curruntCategory[0]  ?> Blog Posts</h2>
    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur id temporibus<br> facere dolorum veniam architecto corrupti, sit enim officia dolorem iusto! Quae debitis praesentium delectus incidunt deserunt ratione vitae voluptas.</p>
    <?php if (isset($post)): ?>
        <?php foreach ($post as $key => $value): ?>
            <section class="flex flex-col justify-center px-72">
                <div class="border space-y-5">
                    <img src="public/<?= $value["post"] ?>" alt="" class="h-[40rem] w-full">
                    <div class="px-20 space-y-5">
                        <h2 class="text-4xl hover:text-blue-700">
                            <?= $value["title"] ?>
                        </h2>
                        <p class="hover:text-blue-700">(
                            <?= $value["author"] ?>)
                        </p>
                        <p class="text-xl hover:text-blue-600">
                            <?= $value["content"] ?>
                        </p>
                        <div class="float-right pb-10"><time>
                                <?= $value["publish_date"] ?>
                            </time></div>
                    </div>
                </div>
            </section>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php require 'partials/footerNav.php'; ?>
<?php require 'partials/footer.php'; ?>