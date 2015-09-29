class Singleton:
  class __Inner:
    def __init__(self,arg):
        self.value = arg
    def __str__(self):
        return repr(self)

  instance = None
  def __init__(self , arg):
      Singleton.instance = Singleton.__Inner(arg)

  def  getInstance(self,arg):
       return Singleton.instance

x = Singleton("test")
print(x.getInstance("test"))
print(x.getInstance("test"))
print(x.getInstance("test"))

