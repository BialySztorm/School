a = int(input("Podaj a: "))
b = int(input("Podaj b: "))
while(a!=0 and b!=0):
    if(a>b):
        a%=b
    else:
        b%=a
print(f"Największy wspólny dzielnik to: {a}")