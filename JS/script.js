window.addEventListener("load", function () {
  let generateBtn = document.getElementById("boutonGen");
  let qr = document.querySelector(".container .qr-box img");
  let qrBox = document.querySelector(".container .qr-box");
  let userInput = document.querySelector(".container .userInput");
  let container = document.querySelector(".container");
  generateBtn.addEventListener("click", () => {
    if (userInput.value.trim() !== "") {
      container.style.height = "460px";
      generateQRCode();
      setTimeout(() => {
        qrBox.style.visibility = "visible";
      }, 200);
      qrBox.classList.add("active"); // Ajoutez la classe active directement ici
    }
  });

  function generateQRCode() {
    fetch("http://localhost/Week_4/PHP/qrcode.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ data: userInput.value }),
    })
      .then(function (response) {
        if (response.ok) {
          return response.json();
        }
        throw new Error("Network response was not ok.");
      })
      .then(function (value) {
        console.log("ty le url:" + value.data);
        let url = `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=${encodeURIComponent(
          value.data
        )}&color=483d8b`;
        qr.src = url;
      })
      .catch(function (error) {
        console.error("There was a problem with the fetch operation:", error);
      });
  }
});
