/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package garnachas;

import java.io.File;
import java.net.URL;
import java.sql.SQLException;
import java.util.ResourceBundle;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
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
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.stage.FileChooser;
import javafx.stage.Stage;

/**
 * FXML Controller class
 *
 * @author xavil
 */
public class ProductoController implements Initializable {

    String pedido;
    @FXML
    private Button MenuPrin;
    @FXML
    private Button imagen;
    @FXML
    private Label txtL;
    @FXML
    private TextField nombre;
    @FXML
    private TextField descripcion;
    @FXML
    private TextField precio;

    /**
     * Initializes the controller class.
     */
    @FXML
    private void enviarP() {
        String nombreE = nombre.getText();
        String descripcionE = descripcion.getText();
        String precioE = precio.getText();
        if(nombreE.trim().isEmpty() || descripcionE.trim().isEmpty() || precioE.trim().isEmpty() || pedido.trim().isEmpty()){
            Alert alert = new Alert(AlertType.WARNING);
            alert.setTitle("Cuidado");
            alert.setHeaderText("Campos invalidos");
            alert.setContentText("LLene sus campos");

            alert.showAndWait();
        }else{
            Conectar cnx = new Conectar();
            String mensaje = cnx.AltaP(nombreE,descripcionE,Float.parseFloat(precioE),pedido);
            Alert alert = new Alert(AlertType.INFORMATION);
            alert.setTitle("Producto");
            alert.setHeaderText("el resultado es");
            alert.setContentText(mensaje);
            alert.showAndWait();
            
        }
        nombre.setText("");
        descripcion.setText("");
        precio.setText("");
        pedido= "";
        txtL.setText("Ruta de la imagen ");
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
    private void buscar(ActionEvent event) {
        FileChooser fc = new FileChooser();
        File selectedFile = fc.showOpenDialog(null);
        if (selectedFile != null) {
            String txt = selectedFile.getName();
            String ruta = "./img/" + txt;
            pedido = ruta;
            txtL.setText("Ruta de la imagen " + ruta);
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
