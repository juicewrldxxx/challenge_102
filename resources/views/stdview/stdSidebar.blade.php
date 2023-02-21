


<div class="sidebar" id="mySidebar">
<div class="side-header">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQeX08GOYbivayOiDrsH6zWnkk0dd4HNvvmIA&usqp=CAU" width="120" height="120" style="border-radius: 50%; object-fit:cover; object-position:top;" alt="Swiss Collection" > 
    <h5 style="margin-top:10px;">Hello {{ Auth::user()->username }}</h5>
</div>

<hr style="border:1px solid; background-color:#8a7b6d; border-color:#3B3131;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="/user"><i class="fa fa-home"></i> Users</a>
    <a href="/asm" ><i class="fa fa-th-large"></i> ASM</a>
    <a href="/challenge" ><i class="fa fa-th"></i> Chellenge</a>

  
  <!---->
</div>
 
<div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
</div>


