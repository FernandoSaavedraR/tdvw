/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package garnachas;

//import java.awt.Image;
import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.stage.Stage;
import javafx.stage.StageStyle;
import javafx.scene.image.Image;
/**
 *
 * @author xavil
 */
public class Garnachas extends Application {

    @Override
    public void start(Stage stage) throws Exception {
        Parent root = FXMLLoader.load(getClass().getResource("FXMLDocument.fxml"));
        
        
        stage.resizableProperty().setValue(Boolean.FALSE);
        stage.setResizable(false);        
        
        Image ico = new Image("file:/../img/fork .png"); 
        stage.getIcons().add(ico);
         stage.setTitle("Tarte de la vie");

        Scene scene = new Scene(root);
        stage.setX(200);
        stage.setY(10);
        stage.setScene(scene);
        stage.show();
    }

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        launch(args);
    }
    
}
