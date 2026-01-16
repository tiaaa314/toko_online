alert("JS MASUK");

// ===== MODE ADMIN (GLOBAL) =====
const params = new URLSearchParams(window.location.search);
const isAdmin = params.get("admin") === "1";
const adminKey = params.get("key");

function adminAktif() {
  return isAdmin && adminKey === "ADMIN123";
}

console.log("ADMIN MODE:", adminAktif());

document.addEventListener("DOMContentLoaded", () => {
  const tombolBeli = document.querySelectorAll(".produk button");

  tombolBeli.forEach((btn) => {
    btn.addEventListener("click", () => {
      const produk = btn.parentElement;
      const nama = produk.querySelector("h3").innerText;
      const harga = produk.querySelector(".harga").innerText;
      const deskripsi = produk.querySelectorAll("p")[1].innerText;

      const infoBox = document.getElementById("info-produk");
      infoBox.innerHTML = `
        <strong>Nama Produk:</strong> ${nama}<br>
        <strong>Harga:</strong> ${harga}<br>
        <strong>Deskripsi:</strong> ${deskripsi}
      `;
      infoBox.style.display = "block";

      if (adminAktif()) {
        console.log("INI ADMIN");
      }
    });
  });
});
