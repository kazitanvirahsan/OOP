// Create Object using new Object()

manager = new Object()
manager.first_name = "any"
manager.salary = "100"
manager.run = function() {
  alert(this.first_name);
  alert(this.salary);
}


// Create object using notation
manager_1 = {
  first_name : "any",
  salary : "100",
  run_func : function() {
    return this.first_name;
  }
}