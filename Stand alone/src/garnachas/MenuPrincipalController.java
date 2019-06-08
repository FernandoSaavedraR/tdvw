/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package garnachas;

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
import javafx.stage.Stage;

/**
 * FXML Controller class
 *
 * @author xavil
 */
public class MenuPrincipalController implements Initializable {

    @FXML
    private Button btn2,recetitas,pedido,Inven,produc;

    /**
     * Initializes the controller class.
     */
   @FXML
   private void inicioSesion (ActionEvent event) throws Exception {
        Parent root = FXMLLoader.load(getClass().getResource("FXMLDocument.fxml"));
        Scene scene = new Scene(root);
        Stage appStage = (Stage) ((Node) event.getSource()).getScene().getWindow();
        appStage.setScene(scene);
        appStage.toFront();
        appStage.show();     
   }
      @FXML
   private void IrReceta (ActionEvent event) throws Exception {
        Parent root = FXMLLoader.load(getClass().getResource("Recetario.fxml"));
        Scene scene = new Scene(root);
        Stage appStage = (Stage) ((Node) event.getSource()).getScene().getWindow();
        appStage.setScene(scene);
        appStage.toFront();
        appStage.show();     
   }
    @FXML
   private void  irIngrediente(ActionEvent event) throws Exception
   {
        Parent root = FXMLLoader.load(getClass().getResource("Ingrediente.fxml"));
        Scene scene = new Scene(root);
        Stage appStage = (Stage) ((Node) event.getSource()).getScene().getWindow();
        appStage.setScene(scene);
        appStage.toFront();
        appStage.show();
   }
      @FXML
   private void IrInven (ActionEvent event) throws Exception {
        Parent root = FXMLLoader.load(getClass().getResource("Inventario.fxml"));
        Scene scene = new Scene(root);
        Stage appStage = (Stage) ((Node) event.getSource()).getScene().getWindow();
        appStage.setScene(scene);
        appStage.toFront();
        appStage.show();     
   }
      @FXML
   private void IrProduct (ActionEvent event) throws Exception {
        Parent root = FXMLLoader.load(getClass().getResource("Producto.fxml"));
        Scene scene = new Scene(root);
        Stage appStage = (Stage) ((Node) event.getSource()).getScene().getWindow();
        appStage.setScene(scene);
        appStage.toFront();
        appStage.show();     
   }
      @FXML
   private void IrPedido (ActionEvent event) throws Exception {
        Parent root = FXMLLoader.load(getClass().getResource("Pedidos.fxml"));
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
