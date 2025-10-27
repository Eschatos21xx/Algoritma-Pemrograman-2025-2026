import java.util.Scanner;

public class Main{
    public static void main(String[] args) {
        Scanner sc=new Scanner(System.in);
        System.out.print("Masukkan angka pertama");
        int a = sc.nextInt();
        System.out.print("Masukkan angka kedua");
        int b = sc.nextInt();

        if(a>b)
        System.out.print(a+"lebih besar dari"+b);
        else if (a<b)
        System.out.print(a+"lebih kecil dari"+b);
        else 
        System.out.print("keduanya sama besar");

        System.out.print("apakah keduanya sama?"+(a==b));
    }
}