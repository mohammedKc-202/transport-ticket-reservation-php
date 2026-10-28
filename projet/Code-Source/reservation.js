let names = [
  "Casablanca",
  "Rabat",
  "Fès",
  "Marrakech",
  "Agadir",
  "Tanger",
  "Meknès",
  "Oujda",
  "Kenitra",
  "Tétouan",
  "Safi",
  "Mohammedia",
  "khouribga",
  "Beni Mellal",
  "El Jadida",
  "Taza",
  "Nador",
  "khemisset",
  "Settat",
  "Larache",
  "Berkane",
  "Essaouira",
  "Laayoune",
  "Midalt",
  "Al Hoceïma",
  "Azemmour",

];

let sortedNames = names.sort();

let input = document.getElementById("input");

input.addEventListener("keyup", (e) => {

  removeElements();
  for (let i of sortedNames) {

    if (
      i.toLowerCase().startsWith(input.value.toLowerCase()) &&
      input.value != ""
    ) {

      let listItem = document.createElement("li");

      listItem.classList.add("list-items");
      listItem.style.cursor = "pointer";
      listItem.setAttribute("onclick", "displayNames('" + i + "')");

      let word = "<b>" + i.substr(0, input.value.length) + "</b>";
      word += i.substr(input.value.length);

      listItem.innerHTML = word;
      document.querySelector(".list").appendChild(listItem);
    }
  }
});
function displayNames(value) {
  input.value = value;
  removeElements();
}
function removeElements() {

  let items = document.querySelectorAll(".list-items");
  items.forEach((item) => {
    item.remove();
  });
};

let names1 = [
  "Casablanca",
  "Rabat",
  "Fès",
  "Marrakech",
  "Agadir",
  "Tanger",
  "Meknès",
  "Oujda",
  "Kenitra",
  "Tétouan",
  "Safi",
  "Mohammedia",
  "khouribga",
  "Beni Mellal",
  "El Jadida",
  "Taza",
  "Nador",
  "khemisset",
  "Settat",
  "Larache",
  "Berkane",
  "Essaouira",
  "Laayoune",
  "Midalt",
  "Al Hoceïma",
  "Azemmour",

];






let sortedNames1 = names1.sort();

let input1 = document.getElementById("input1");

input1.addEventListener("keyup", (e) => {

  removeElements1();
  for (let j of sortedNames1) {

    if (
    j.toLowerCase().startsWith(input1.value.toLowerCase()) &&
    input1.value != ""
    ) {

      let listItem1 = document.createElement("li");

      listItem1.classList.add("list1-items");
      listItem1.style.cursor = "pointer";
      listItem1.setAttribute("onclick", "displayNames1('" + j + "')");

      let word1 = "<b>" + j.substr(0, input1.value.length) + "</b>";
      word1 += j.substr(input1.value.length);

      listItem1.innerHTML = word1;
      document.querySelector(".list1").appendChild(listItem1);
    }
  }
});
function displayNames1(value1) {
  input1.value = value1;
  removeElements1();
}
function removeElements1() {

  let items1 = document.querySelectorAll(".list1-items");
  items1.forEach((item1) => {
    item1.remove();
  });
};
