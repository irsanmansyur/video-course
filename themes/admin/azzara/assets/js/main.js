ready(() => {
  let path = window.location.href;
  const fullpath = path;
  path = path.indexOf("#") > 0 ? path.substring(0, path.indexOf("#")) : path;
  path = path.indexOf("?") > 0 ? path.substring(0, path.indexOf("?")) : path;
  path.indexOf("index.php") > 0 ? [console.log("Ada  index"), path = path.replace("/index.php", "")] : console.log("tdk ada index");
  path = path.toLowerCase().toString();

  let elLinkSubmenu = document.querySelector(`li.s-menu>a[href="${path}"]`);
  let elLinkSubmenuFullpath = document.querySelector(`li.s-menu>a[href="${fullpath}"]`);

  if (elLinkSubmenu) {
    elLinkSubmenu.closest("li").classList.add("active");
    elLinkSubmenu.closest(".collapse").classList.add("show");
    elLinkSubmenu.closest(".nav-item").classList.add('active', 'submenu');
  }
  if (elLinkSubmenuFullpath) {
    elLinkSubmenuFullpath.closest("li").classList.add("active");
    elLinkSubmenuFullpath.closest(".collapse").classList.add("show");
    elLinkSubmenuFullpath.closest(".nav-item").classList.add('active', 'submenu');

  }

})
