<?php session_start(); ?>
<?php if(!isset($_SESSION['loginAdmin'])){
    header("location: /blog/admin");
} ?>
<?php require 'core/validation.php'; ?>
<aside class="bg-gray-900 border-r h-screen w-[20rem] fixed leading-10 flex flex-col gap-5 items-center justify-between">
    <div class="w-full flex flex-col items-center gap-20 ">
        <button class="bg-gray-900 w-full shadow-md p-2">
            <div class="bg-gray-500 h-24">
                <img src="https://img.freepik.com/premium-vector/word-concept-color-geometric-shapes-blog_205544-13021.jpg" alt="" class="h-full w-full object-fit">
            </div>
        </button>
        <nav class="w-full ">
            <ul class="font-semi-bold text-gray-400 text-xl w-full font-bold">
                <li class="p-5 pl-10"><a href="/blog/admin/blogs" target="iframe">Blogs</a></li>
                <li class="p-5 pl-10"><a href="/blog/admin/categories" target="iframe">Categories</a></li>
                <li class="p-5 pl-10"><a href="/blog/admin/add-blog" target="iframe">Add Blog</a></li>    
                <li class="p-5 pl-10"><a href="/blog/admin/add-category" target="iframe">Add category</a></li>           
                <?php
                if (isset($_SESSION['super_admin_login'])): ?>
                    <li class="p-5 pl-10"><a href="ADMINS.PHP" target="iframe">Admins</a>
                <?php endif; ?>
            </ul>
        </nav>

    </div>
    <footer class="w-full text-gray-300 font-bold text-xl">
        <form action="/blog/admin/adminController" method="post">
            <button name="log_out_admin" class="bg-red-700 w-full py-5">Log Out</button>
        </form>
    </footer>
</aside>
