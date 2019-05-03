var list = document.getElementById("select-list");
items =  [ "rocky","singh"];
for(var i in items) {
  list.add(new Option(items[i]));
}
