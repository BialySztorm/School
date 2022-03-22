#include <iostream>
#include <math.h>

int main()
{
    while(true)
    {
        double a, b, c;
        std::cout<<"Podaj przekatna (zero konczy): ";
        std::cin>>a;
        a*= 2.54;
        if(a == 0)
            break;
        else
        {
            std::cout<<"Podaj pierwsza proporcje: ";
            std::cin>>b;
            std::cout<<"Podaj druga proporcje: ";
            std::cin>>c;
            double atanx = atan(b/c);
            //std::cout<<atanx<<std::endl;
            double sinx = sin(atanx)*a;
            //std::cout<<sinx<<std::endl;
            double cosx = cos(atanx)*a;
            //std::cout<<cosx<<std::endl;
            std::cout<<"width: "<<sinx<<", height: "<<cosx<<std::endl;
        }
    }
    return 0;
}
