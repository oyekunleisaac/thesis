const calculate =()=>{
  var addBtn = document.getElementsByClassName("addBtn");
  for (var i = 0; i < addBtn.length; i++) {
    var button = addBtn[i];
    button.addEventListener("click", addBtnClicked);
  }
}
calculate();

function addBtnClicked(event) {
  var button = event.target;
  var menuItem = button.parentElement;
  var bookID = menuItem.getElementsByClassName('book_id')[0].innerText; 
  addItemToModal(bookID);

}


const addItemToModal=(bookID)=>{
   document.querySelector("#bookID").value = bookID;
}

function search_cat() {
  let input = document.getElementById("searchbar").value;
  input = input.toLowerCase();
  let x = document.getElementsByClassName("col");
  for (i = 0; i < x.length; i++) {
    if (!x[i].innerHTML.toLowerCase().includes(input)) {
      x[i].style.display = "none";
    } else {
      x[i].style.display = "block";
    }
  }
}
