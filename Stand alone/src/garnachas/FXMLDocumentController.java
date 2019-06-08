/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package garnachas;

import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.stage.Stage;

/**
 *
 * @author xavil
 */
public class FXMLDocumentController implements Initializable {
    
    @FXML
    private Label label;
    @FXML
    private Button btn1;
    @FXML
    private TextField usr;
    @FXML
    private PasswordField psw;
    @FXML Label mensaje;
    
    @FXML
   private void handleButtonAction (ActionEvent event) throws Exception {
        Parent root = FXMLLoader.load(getClass().getResource("MenuPrincipal.fxml"));
        Scene scene = new Scene(root);
        Conectar cnx = new Conectar();
        if(!psw.getText().trim().isEmpty() && !usr.getText().trim().isEmpty()){
        boolean valida = cnx.login(usr.getText(),psw.getText());
        if(valida){
        Stage appStage = (Stage) ((Node) event.getSource()).getScene().getWindow();
        appStage.setScene(scene);
        appStage.toFront();
        appStage.show();   
        }else{
            mensaje.setText("Credenciales incorrectas");
        } 
        }else{
            psw.setText("");
            usr.setText("");
            mensaje.setText("Revise sus campos");
        }
   }
   @FXML
   private void registrarse(ActionEvent event) throws IOException{
       Parent root = FXMLLoader.load(getClass().getResource("registro.fxml"));
        Scene scene = new Scene(root);
         Stage appStage = (Stage) ((Node) event.getSource()).getScene().getWindow();
        appStage.setScene(scene);
        appStage.toFront();
        appStage.show();    
   }
    
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    
    
}
