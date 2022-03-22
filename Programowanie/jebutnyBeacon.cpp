#include <iostream>

int main()
{
    int wynik = 0;
    int tmp = 3;
    for(int i = 1; i<350; i++, tmp+=2)
    {
        wynik+= tmp*tmp;
        // std::cout<<"poziom "<<i<<" = "<<tmp<<"\n";
    }
    std::cout<<"wynik = "<<wynik<<"\n";
    return 0;
}