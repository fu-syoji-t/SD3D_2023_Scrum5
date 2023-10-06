// xampp > my.ini > max_allowed_pachet= 1M~1G

package A_sql.Insert_user;

import java.io.BufferedWriter;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.OutputStreamWriter;
import java.util.Random;

public class Echo4 {
    public static void main(String[] args) {
        String s = "INSERT INTO `users`(`user_loginID`, `user_password`, `user_name`, `user_course`, `user_major`, `user_grade`, `user_classname`, `user_Fsubject`) \nVALUES\n";
        
        String[] ary = {"a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"};
        String[] Ary1 = {"佐藤","佐藤","佐藤", "鈴木", "高橋", "田中","田中", "渡辺", "佐藤","伊藤", "山本", "中村","中村", "小林", "加藤","斎藤","本田","石川","松丸","比嘉","近藤","秋月","東","山西","堀","七海","石松","村上","中野","志水","田中","桐生","寺井","神戸","諸橋","斎木","米田","佐々木"};
        String[] Ary2 = {"慎吾","朱莉","次郎", "美紀", "健太", "麻衣", "剛", "真理子", "康介", "亜美", "大地", "楓", "胡桃", "恵那", "竜也", "孝行", "聖樹", "凛太郎", "凛", "アイ", "水湖樹", "翔希", "玲央", "波瑠", "啓喜", "大也", "夏月", "八重子", "佳道","颯太","明由美","文徳","糸一","壱成","美由紀","隆二","正則","翔馬"};
        String[] course = {"情報システム科","情報システム専攻科","情報工学科","国際ITエンジニア科"};
        String[][] major = {{"AIプログラミング専攻","ネットワーク専攻","プログラミング専攻"},{"AIエンジニア専攻","ネットワークエンジニア専攻","システムエンジニア専攻"},{"AI＆Iot専攻","高度ネットワーク・セキュリティ専攻","高度ITシステム専攻"}};
        String[] fsub1 = {"情報処理試験対策","ネットワークⅠ","コンピュータシステムⅠ","プログラミング演習Ⅰ","ビジネスソフトウェアⅠ","コンピュータオペレーションⅠ"};
        String[][] fsub2 = {{"AIプログラミング演習","Webプログラミング演習","ディープラーニング演習","システム開発演習","電子回路","制御プログラミング演習"},{"ネットワーク構築演習","クラウド演習","Webアプリケーション","ネットワーク設計演習","セキュリティ","スクリプト基礎"},{"Webプログラミング演習","Webフロントエンド演習","システム設計","システム開発演習","テスト技法","情報処理試験対策"}};
        String[] nsub = {"ITシステム基礎","言語基礎","比較文化論","ビジネスコミュニケーション","プログラミング演習","組み込みソフトウェア開発演習"};


        Random rand = new Random();
        int[] cAry = {0,0,1,1,1,1,1,1,2,2,2,2,3,3};
        int grade,n;
        String c;
        String m = "";
        String cls1,cls2;
        String[] cls2ary = {"A","B","C","D","E","F","G"};
        String fsub = "";

        for(int x=0;x<26;x++){
            for(int y=0;y<26;y++){
                for(int z=0;z<26;z++){

                    grade = n = 0;
                    m = c = cls1 = cls2 = fsub = "";
                    
                    c = course[cAry[rand.nextInt(14)]];

                    if(c == course[0]){
                        grade = rand.nextInt(2)+1;
                    }else if(c == course[1]){
                        grade = rand.nextInt(3)+1;
                    }else if(c == course[2]){
                        grade = rand.nextInt(4)+1;
                    }else{
                        grade = rand.nextInt(2)+1;
                    }

                    if(c == course[0]){
                        m = major[0][rand.nextInt(3)];
                    }else if(c == course[1]){
                        m = major[1][rand.nextInt(3)];
                    }else if(c == course[2]){
                        m = major[2][rand.nextInt(3)];
                    }

                    n = rand.nextInt(6);
                    if(grade == 1){
                        cls1 = "IT";
                        fsub = fsub1[n];
                    }else if(m == major[0][0] || m == major[1][0] || m == major[2][0]){
                        cls1 = "AI";
                        fsub = fsub2[0][n];
                    }else if(m == major[0][1] || m == major[1][1] || m == major[2][1]){
                        cls1 = "NE";
                        fsub = fsub2[1][n];
                    }else if(m == major[0][2] || m == major[1][2] || m == major[2][2]){
                        cls1 = "SD";
                        fsub = fsub2[2][n];
                    }else if(c == course[3]){
                        cls1 = "NI";
                        fsub = nsub[n];
                    }

                    if(grade == 2){
                        fsub += "Ⅰ";
                    }else if(grade == 3){
                        fsub += "Ⅱ";
                    }else if(grade == 4){
                        fsub += "Ⅲ";
                    }

                    if(grade == 1){
                        cls2 = cls2ary[rand.nextInt(7)];
                    }else if(c == course[2]){
                        cls2 = cls2ary[rand.nextInt(2)];
                    }else if(c == course[1]){
                        cls2 = cls2ary[rand.nextInt(3)+2];
                    }else{
                        cls2 = cls2ary[rand.nextInt(2)+5];
                    }

                    s += "('"+ary[x]+ary[y]+ary[z]+"','"+ary[x]+ary[y]+ary[z]+"','"+Ary1[rand.nextInt(38)]+" "+Ary2[rand.nextInt(38)]+"','"+c+"','"+m+"',"+grade+",'"+cls1+grade+cls2+"','"+fsub+"'),\n";
                
                }
            }
        }

        s = s.substring(0,s.length()-2);

        String filePath = "A_sql/Insert_user/Insert_users.txt";

        try {
            // 文字エンコーディングを指定してファイルに書き込む
            BufferedWriter writer = new BufferedWriter(
                    new OutputStreamWriter(new FileOutputStream(filePath), "UTF-8"));

            String text = s; // 出力するテキスト

            // ファイルにテキストを書き込む
            writer.write(text);

            // ファイルを閉じる
            writer.close();

            System.out.println("ファイルに書き込みが完了しました。");
        } catch (IOException e) {
            System.out.println("ファイル書き込みエラー: " + e.getMessage());
        }
    }
}
