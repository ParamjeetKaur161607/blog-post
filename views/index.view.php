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
    <section class="bg-white space-y-10">
        <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam distinctio deleniti,
            suscipit mollitia veniam <br>laboriosam reprehenderit, eligendi illum consequatur recusandae nam optio
            aperiam corrupti aliquam praesentium ad aliquid ipsa error!</p>
        <div class="flex gap-10 flex items-center justify-center">
            <article
                class="bg-no-repeat bg-cover bg-top bg-[url('public/1.jpg')] flex justify-center items-center font-bold h-[22rem] w-[25rem]">
                <button name="travel" class="bg-white hover:bg-blue-600 hover:text-white w-[10rem] p-5 text-blue-600 text-xl">Travel</button>
            </article>
            <article
                class="bg-no-repeat bg-cover bg-top bg-[url('public/1.jpg')] flex justify-center items-center font-bold h-[22rem] w-[25rem]">
                <button name="eat" class="bg-white hover:bg-blue-600 hover:text-white w-[10rem] p-5 text-blue-600 text-xl">Eat</button>
            </article>
            <article
                class="bg-no-repeat bg-cover bg-top bg-[url('public/1.jpg')] flex justify-center items-center font-bold h-[22rem] w-[25rem]">
                <button name="relax" class="bg-white hover:bg-blue-600 hover:text-white w-[10rem] p-5 text-blue-600 text-xl">Relax</button>
            </article>
        </div>
    </section>
    <?php if(isset($post)): ?>
    <?php foreach ($post as $key => $value) : ?>
    <section class="flex flex-col justify-center px-72">
        <div class="border space-y-5">
            <img src="public/<?= $value["post"] ?>" alt="" class="h-[40rem] w-full">
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