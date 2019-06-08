/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package garnachas;

import java.io.File;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Alert.AlertType;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.stage.FileChooser;
import javafx.stage.Stage;

/**
 * FXML Controller class
 *
 * @author xavil
 */
public class IngredienteController implements Initializable {


    @FXML
    private Button MenuPrin;
    @FXML
    private TextField nombre;
    @FXML
    private TextField descripcion;
    @FXML
    private TextField precio;
    @FXML
    private Button agregar;

    /**
     * Initializes the controller class.
     */
   
    @FXML
    private void aIng(){
        String nombreE = nombre.getText();
        String descripcionE = descripcion.getText();
        String precioE = precio.getText();
        if(nombreE.trim().isEmpty() || descripcionE.trim().isEmpty() || precioE.trim().isEmpty()){
            Alert alert = new Alert(AlertType.WARNING);
            alert.setTitle("Ingrediente");
            alert.setHeaderText("Campos invalidos");
            alert.setContentText("LLene sus campos");

            alert.showAndWait();
        }else{
            try{
            Conectar cnx = new Conectar();
           String mensaje= cnx.AltaIngrediente(nombreE,descripcionE,Integer.parseInt(precioE));
            Alert alert = new Alert(AlertType.INFORMATION);
            alert.setTitle("Producto");
            alert.setHeaderText("el resultado es");
            alert.setContentText(mensaje);
            alert.showAndWait();
            }catch(NumberFormatException e){
                 Alert alert = new Alert(AlertType.WARNING);
                alert.setTitle("Producto");
                alert.setHeaderText("revise sus datos");
                alert.setContentText("cantidad debe ser numerica");
                alert.showAndWait();
            }
            nombre.setText("");
            descripcion.setText("");
            precio.setText("");
        }
    }
    @FXML
    private void IrMenu(ActionEvent event) throws Exception {
        Parent root = FXMLLoader.load(getClass().getResource("MenuPrincipal.fxml"));
        Scene scene = new Scene(root);
        Stage appStage = (Stage) ((Node) event.getSource()).getScene().getWindow();
        appStage.setScene(scene);
        appStage.toFront();
        appStage.show(); 
    }
    @FXML
    private void surtir(){
        String nombreE = nombre.getText();
        String descripcionE = descripcion.getText();
        String precioE = precio.getText();
        if(nombreE.trim().isEmpty() ||  precioE.trim().isEmpty()){
            Alert alert = new Alert(AlertType.WARNING);
            alert.setTitle("Ingrediente");
            alert.setHeaderText("Campos invalidos");
            alert.setContentText("LLene sus campos");

            alert.showAndWait();
        }else{
            Conectar cnx = new Conectar();
            try{
               String mensaje= cnx.surtir(nombreE,Integer.parseInt(precioE));
            Alert alert = new Alert(AlertType.INFORMATION);
            alert.setTitle("Producto");
            alert.setHeaderText("el resultado es");
            alert.setContentText(mensaje);
            alert.showAndWait();
            nombre.setText("");
            descripcion.setText("");
            precio.setText(""); 
            }catch(NumberFormatException ex){
                Alert alert = new Alert(AlertType.WARNING);
                alert.setTitle("Producto");
                alert.setHeaderText("revise sus datos");
                alert.setContentText("cantidad debe ser numerica");
                alert.showAndWait();
            }
            
        }
    }

      /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }

}
