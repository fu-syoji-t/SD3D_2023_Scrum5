package A_sql;

import java.util.Scanner;

public class A_Insert_replies_echo{
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        System.out.println("replyするuserID");
        int userID = sc.nextInt();
        System.out.println("postIDのスタート位置");
        int fromNum = sc.nextInt();
        System.out.println("postIDのエンド位置");
        int toNum = sc.nextInt();
        System.out.println("replyのテキスト");
        String text = sc.next();

        System.out.println("INSERT INTO `replies`   (`post_id`, `user_id`, `reply_text`) \nVALUES");
        for(int i=fromNum;i<=toNum;i++){
            
            System.out.print("      ("+i+", "+userID+", '"+text+"')");
            if(i<toNum){
                System.out.print(",\n");
            }
        }

        sc.close();
    }
}