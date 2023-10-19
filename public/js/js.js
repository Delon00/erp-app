const openModalLink = document.getElementById("openModalLink");
const closeModal = document.getElementById("closeModal");
const modal = document.getElementById("myModal");
openModalLink.addEventListener("click", () => {
    modal.style.display = "block";
});

closeModal.addEventListener("click", () => {
    modal.style.display = "none";
});

window.addEventListener("click", (event) => {
    if (event.target === modal) {
        modal.style.display = "none";
    }
});
