<?php require 'partials/header.php'; ?>
<?php require 'partials/navigation.php'; ?>
<?php $post=$database->select3('blogs'); ?>

<main class="space-y-20 pb-10">
    <article class="bg-no-repeat bg-cover bg-top
        bg-[url('public/1.jpg')] h-[42rem] flex justify-center items-center font-bold">
        <div class="flex flex-col items-center justify-center bg-white/50 py-5 px-20">
            <p class="text-xl">Travel Blog</p>
            <h1 class="font-bold text-[5rem]">Going Places</h1>
            <p class="text-xl">I haven’t been everywhere, but it’s on my list</p>
        </div>
    </article>    
    <?php if(isset($post)): ?>
    <?php foreach ($post as $key => $value) : ?>
    <section class="flex flex-col justify-center px-72">
        <div class="border space-y-5">
            <img src="public/blog/<?= $value["post"] ?>" alt="" class="h-[40rem] w-full">
            <div class="px-20 space-y-5">
                <h2 class="text-4xl hover:text-blue-700"><?= $value["title"] ?></h2>
                <p class="hover:text-blue-700">(<?= $value["author"] ?>)</p>
                <p class="text-xl hover:text-blue-600"><?= $value["content"] ?></p>
                <div class="float-right pb-10"><time><?= $value["publish_date"] ?></time></div>
            </div>
        </div>
    </section>
    <?php endforeach; ?>
    <?php endif; ?>
</main>

<?php require 'partials/footerNav.php'; ?>
<?php require 'partials/footer.php'; ?>