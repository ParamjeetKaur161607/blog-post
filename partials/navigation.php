<?php $category=$database->selectALL('category') ?>
<header class="bg-white py-5 px-20 sticky top-0 shadow-lg">
    <nav class="flex justify-between items-center">
        <div class="h-16 w-28">
            <img src="https://img.freepik.com/premium-vector/word-concept-color-geometric-shapes-blog_205544-13021.jpg" alt="logo" class="h-full w-full object-cover">
        </div>
        <ul class="flex  gap-10 text-lg">
            <li><a href="/blog">Home</a></li>
            <?php foreach ($category as $key => $value) :?>
            <li>
                <form action="/blog/category" method="get">
                    <button name="<?=$value['id']?>"><?=$value['category']?></button>
                </form>
            </li>
            <?php endforeach;?>
        </ul>
        <ul class="flex  gap-10 text-lg">
            <li><a href="https://www.linkedin.com/in/paramjeet-kaur-a8772827a/">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="gray" xmlns="http://www.w3.org/2000/svg"><path d="M6.94048 4.99993C6.94011 5.81424 6.44608 6.54702 5.69134 6.85273C4.9366 7.15845 4.07187 6.97605 3.5049 6.39155C2.93793 5.80704 2.78195 4.93715 3.1105 4.19207C3.43906 3.44699 4.18654 2.9755 5.00048 2.99993C6.08155 3.03238 6.94097 3.91837 6.94048 4.99993ZM7.00048 8.47993H3.00048V20.9999H7.00048V8.47993ZM13.3205 8.47993H9.34048V20.9999H13.2805V14.4299C13.2805 10.7699 18.0505 10.4299 18.0505 14.4299V20.9999H22.0005V13.0699C22.0005 6.89993 14.9405 7.12993 13.2805 10.1599L13.3205 8.47993Z"></path></svg>
            </a></li>
            <li><a href="mailto:paramjeetkaur161607@gmail.com">
                <svg class="w-6 h-6" fill="gray" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M1.574 5.286l7.5 4.029c.252.135.578.199.906.199.328 0 .654-.064.906-.199l7.5-4.029c.489-.263.951-1.286.054-1.286H1.521c-.897 0-.435 1.023.053 1.286zm17.039 2.203l-7.727 4.027c-.34.178-.578.199-.906.199s-.566-.021-.906-.199-7.133-3.739-7.688-4.028C.996 7.284 1 7.523 1 7.707V15c0 .42.566 1 1 1h16c.434 0 1-.58 1-1V7.708c0-.184.004-.423-.387-.219z"></path></svg>
            </a></li>
            <li><a href="tel:7973276717">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="gray"><path d="M0 0h24v24H0z" fill="none"></path><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56-.35-.12-.74-.03-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"></path></svg>
            </a></li>
        </ul>
    </nav>
</header>