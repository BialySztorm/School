#include <iostream>

int main()
{
    int a, b, c;
    std::cout<<"Podaj pierwsza liczbe: ";
    std::cin>>a;
    std::cout<<"Podaj druga liczbe: ";
    std::cin>>b;
    if(a>b)
        std::cout<<"\na>b\n";
    else if(a<b)
        std::cout<<"\nb>a\n";
    else
        std::cout<<"\na=b\n";
    std::cout<<"Podaj liczbe: ";
    std::cin>>c;
    if(c>10 && c<100)
        std::cout<<
    system("pause");
    return 0;
}