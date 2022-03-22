#include <iostream>
#include <fstream>
#include <cstdlib>

int main(){
    std::cout<<"Podaj sciezke: ";
    char sciezka[100];
    std::cin>>sciezka;

    std::fstream plik1;
    plik1.open(sciezka);

    if(!plik1.is_open())
        std::cout<<"plik sie nie otworzyl";
    else
        std::cout<<"plik sie otworzyl";

}