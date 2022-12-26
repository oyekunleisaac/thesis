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