# Dane wejściowe ustwaione na wstępie:
# list = [20, 6, 15, 7, 5, 1, 820, 6, 15, 7, 5, 1, 8 ]
# Dane wejściowe ustwaione w trakcie trwania programu
list = []
for i in range (10):
    list.append(input(f"Podaj {i+1} liczbę: "))
min = list[0]
max = list[0]
for i in range (len(list)):
    pom = list[i]
    if(pom<min):
        min=pom
        # print("min")
    if(pom>max):
        max=pom
        # print("max")
print(f"maksymalna liczba to: {max}, a minimalna to {min}")