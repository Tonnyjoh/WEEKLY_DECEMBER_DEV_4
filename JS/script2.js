window.addEventListener("load", function () {
  class Menu {
    constructor(_name, _activateID, _fa) {
      this.name = _name;
      this.activateID = _activateID;
      this.fa = _fa;
    }

    getHTMLElement() {
      const element = document.createElement("div");
      element.className = "menu";
      const p = document.createElement("p");
      const sp = document.createElement("span");
      const iT = document.createElement("i");
      iT.className = this.fa;
      p.appendChild(iT);
      // const i = document.createElement("i");
      // i.className = "fa-solid fa-arrow-right";
      element.appendChild(p);
      p.appendChild(sp);
      sp.innerHTML = ` ${this.name}`;
      // element.appendChild(i);
      return element;
    }
  }

  const menus = [];
  const pages = [];

  function activeMenu() {
    menus.push(new Menu("Url", "/", "fa-solid fa-link"));
    menus.push(new Menu("QRcode", "/settings", "fa-solid fa-qrcode"));
    menus.push(new Menu("Share", "/info/about", "fa-solid fa-share-alt"));

    pages.push(document.getElementById("short"));
    pages.push(document.getElementById("qrcode"));
    pages.push(document.getElementById("share"));
  }

  function displayMenu() {
    const sidebarElement = document.getElementById("sidebar");
    const sidebarMenus = sidebarElement.querySelectorAll(":scope > .menu");
    sidebarMenus.forEach((menu) => menu.remove());

    menus.forEach((menu, i) => {
      const element = menu.getHTMLElement();
      sidebarElement.appendChild(element);
      element.addEventListener("click", () => openPage(i));
    });
  }

  function openPage(index) {
    pages.forEach((page) => (page.style.display = "none"));
    pages[index].style.display = "block";
  }
  let btnCopy = document.getElementById("btnCopy");
  btnCopy.addEventListener("click", function () {
    copyToClipboard();

    btnCopy.innerHTML = "copied";
  });
  function copyToClipboard() {
    var copyText = document.getElementById("tylelien");
    var textArea = document.createElement("textarea");
    textArea.value = copyText.innerHTML; // Utilisez copyText.href pour obtenir le contenu du href
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand("copy");
    document.body.removeChild(textArea);
    // alert("Link copied to clipboard: " + copyText.href); // Affiche le contenu du href dans l'alerte
  }
  var acc = document.querySelector(".accordion");
  acc.addEventListener("click", function () {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });

  activeMenu();
  displayMenu();
  openPage(0);
});
