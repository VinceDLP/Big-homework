f = open('1.txt','r')
line = f.readline().strip('\n')
s = str()
while line:
     number = int(line,2)
     char = chr(number)
     s+=char
     line = f.readline().strip('\n')
print (s)