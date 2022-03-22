#include <iostream>

void menu();

int main(){
    int c;
    double a, b;
    while(true)
    {
        system("cls");
        menu();
        std::cout<<"Wybierz dzialanie: ";
        std::cin>>c;
        if(c==0)
            break;
        system("cls");
        std::cout<<"Podaj a: ";
        std::cin>>a;
        std::cout<<"Podaj b: ";
        std::cin>>b;
        switch(c)
        {
            case 1:
                std::cout<<a<<" + "<<b<<" = "<<a+b<<std::endl;
                break;
            case 2:
                std::cout<<a<<" - "<<b<<" = "<<a-b<<std::endl;
                break;
            case 3:
                std::cout<<a<<" * "<<b<<" = "<<a*b<<std::endl;
                break;
            case 4:
                std::cout<<a<<" / "<<b<<" = "<<a/b<<std::endl;
                break;
        }
        system("pause");
    }
}

void menu()
{
    std::cout<<"<----------------->\n";
    std::cout<<"Wybierz opcje\n";
    std::cout<<"[0] Exit\n";
    std::cout<<"[1] Dodawanie\n";
    std::cout<<"[2] Odejmowanie\n";
    std::cout<<"[3] Mnozenie\n";
    std::cout<<"[4] Dzielenie\n";
    std::cout<<"<----------------->\n";
}