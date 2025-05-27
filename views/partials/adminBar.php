<div class="admin-bar">
  <div class="container">
    <a href="/users_manage">المستخدمون</a>
    <a href="/manage">الأبحاث</a>
    <!-- <form action="/research_create" method="get"><input type="hidden" name="" value=""><button type="submit"  aria-label="الاوقاف">بحث</button></form> -->

  </div>
</div>


<style>
.admin-bar {
  background-color: #fff;
  color: #fff;
  padding: 8px 0;
  font-size: 14px;
  position: fixed;
  top: 100px;
  width: 100%;
  z-index: 9999;
  box-shadow: 0 2px 4px rgba(0,0,0,0.2);
}
.admin-bar .container {
  width: 90%;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.admin-bar a {
  color:rgb(0, 0, 0);
  margin: 0 10px;
  text-decoration: none;
  font-size: 20px;
}
.admin-bar a:hover {
  text-decoration: underline;
}
body {
  padding-top: 40px; /* تعويض مساحة AdminBar */
}
</style>