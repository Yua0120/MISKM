const mainBox = document.querySelector('.like-box');
const like = document.querySelectorAll('.box');
let index = 0;

function boxChange() {
  like.forEach(like => {
    like.classList.add("hidden");
  });

  like[index].classList.remove("hidden");
}

mainBox.addEventListener('click', () => {
  index++;
  if (index === like.length) {
    index = 0;
  }

  boxChange();
});