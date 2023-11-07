console.log("hello world!");
const btn = document.querySelectorAll("#btn");
const form = document.querySelectorAll("#form");
const el = Array.from(btn);
console.log(el);
el.forEach((el) => {
    console.log(el.form);
    el.addEventListener("click", (e) => {
        console.log("clicked", e);
    });
});
