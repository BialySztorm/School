#include <iostream>
#include <vector>
#include <algorithm>
#include <ctime>
using namespace std;

int main()
{
    vector <vector <int>> tab;
    vector <int> pom;
    // tab.push_back(1);
    // tab.push_back(2);
    // tab.push_back(3);
    // cout<<"\ncapacity: "<<tab.capacity()<<"\n";
    // tab.insert(tab.begin(),0);
    // for(int i =0; i<tab.size(); i++)
    // {
    //     cout.width(3);
    //     cout<<tab[i];
    // }
    // cout<<"\ncapacity: "<<tab.capacity()<<"\n";
    // for(int i =0; i<10; i++)
    // {
    //     tab.push_back(i+1);
    //     cout<<"\ncapacity: "<<tab.capacity()<<"\n";
    // }
    // for(int i =0; i<tab.size(); i++)
    // {
    //     cout.width(3);
    //     cout<<tab[i];
    // }
    // cout<<endl;
    // sort(tab.begin(),tab.end());
    // for(int i =0; i<tab.size(); i++)
    // {
    //     cout.width(3);
    //     cout<<tab[i];
    // }

    srand(time(0));
    for(int i = 0; i<10; i++)
    {
        for(int j = 0; j<10; j++)
            pom.push_back(rand()%100);
        tab.push_back(pom);
        pom.clear();
    }
    for(int i = 0; i<10; i++)
    {
        for(int j = 0; j<10; j++)
        {
            cout.width(3);
            cout<<tab[i][j];
        }
        cout<<endl;
    }


    return 0;
}