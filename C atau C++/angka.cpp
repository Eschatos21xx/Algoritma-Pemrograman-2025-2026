#include<iostream>
using namespace std;

int main() {
    int a,b;
    cout<<"Masukkan dua angka: ";
    cin>>a>>b;
    cout<<"Masukkan angka kedua: ";
    cin>>b;

    if(a>b)
    cout<<a<<" adalah angka terbesar"<<b<<endl;
    else if(a<b)
    cout<<a<<"lebih kecil dari"<<b<<endl;
    else
    cout<<"Keduanya sama besar"<<endl;

    cout<<"Apakah keduanya sama? "<<(a==b);
}