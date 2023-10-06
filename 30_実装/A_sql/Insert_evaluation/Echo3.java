package A_sql.Insert_evaluation;

import java.io.BufferedWriter;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.OutputStreamWriter;

public class Echo3 {
    public static void main(String[] args) {
        String s = "INSERT INTO `evaluation`(`user_id`, `evaluation_trp`, `evaluation_receivednum`, `evaluation_receivedvalue`, `evaluation_sentnum`, `evaluation_sentvalue`)\nVALUES\n";
        double id, id3, trp, num, Rvalue, Svalue;
        for(int x=1; x<=13; x++){
            for(int y=1; y<=13; y++){
                for(int z=1; z<=13; z++){
                    id = (x-1)*13*13+(y-1)*13+z;
                    id3 = id/26;
                    trp = id3*id3*id3*id3*id3*id3*id3*id3*id3/1024/1024/1024/4+id/2;
                    
                    num = (int)Math.sqrt(trp*5-9);
                    if(num!=0){
                        Rvalue = num*num/(num/2)*(id/4394)+num*3.5;
                        Svalue = -num*num/(num/2)*(id/4394)+num*4.5;
                    }else{
                        Rvalue = 0;
                        Svalue = 0;
                    }
                    
                    s += "                        ("+(int)id+","+(int)trp+","+(int)num+","+(int)Rvalue+","+(int)num+","+(int)Svalue+"),\n";

                }
            }
        }
        s = s.substring(0,s.length()-2);

        String filePath = "A_sql/Insert_evaluation/Insert_evaluation.txt";

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