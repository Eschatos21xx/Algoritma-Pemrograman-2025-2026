import java.util.Scanner;
public class luas_lingkara {
    public static void main(String[] args) {
        final double pi = 3.14;
        Scanner sc = new Scanner(System.in);
        System.out.print("Masukkan jari-jari : ");
        double r = sc.nextDouble();
        double luas = pi * r * r;
        System.out.println("Luas lingkaran " +  luas);
    }
}
