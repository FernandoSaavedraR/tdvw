/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package garnachas;

import java.net.URL;
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
import javafx.scene.control.ComboBox;
import javafx.scene.control.TextField;
import javafx.stage.Stage;

/**
 * FXML Controller class
 *
 * @author xavil
 */
public class RecetarioController implements Initializable {

    @FXML
    private Button MenuPrin;
    @FXML
    private ComboBox<String> Producto;
    @FXML
    private ComboBox<String> ingrediente;
    @FXML
    private TextField cantidad;

    /**
     * Initializes the controller class.
     */
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
    private void agregarIng() {
        try {
            String producto = Producto.getSelectionModel().getSelectedItem();
            String Ingrediente = ingrediente.getSelectionModel().getSelectedItem();
            int quantity = Integer.parseInt(cantidad.getText());
            Conectar cnx = new Conectar();
            String mensaje = cnx.altaReceta(producto, Ingrediente, quantity);
            System.out.println(mensaje);
            Alert alert = new Alert(Alert.AlertType.INFORMATION);
            alert.setTitle("RECETA");
            alert.setHeaderText("Este es el resultado de su transaccion");
            alert.setContentText(mensaje);

            alert.showAndWait();

        } catch (NullPointerException e ) {
            System.out.println(e);
        } catch (NumberFormatException e) {
            Alert alert = new Alert(AlertType.WARNING);
            alert.setTitle("Ingrediente");
            alert.setHeaderText("Campos invalidos");
            alert.setContentText("Cantidad debe ser numerico");

            alert.showAndWait();
        }
    }

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        llenarSelects();
    }

    public void llenarSelects() {
        ObservableList<String> productos = FXCollections.observableArrayList();
        ObservableList<String> ingredientes = FXCollections.observableArrayList();
        Conectar cnx = new Conectar();
        ingredientes = cnx.selectIngredientes();
        productos = cnx.selectProductos();
        Producto.getItems().clear();
        Producto.setItems(productos);
        ingrediente.getItems().clear();
        ingrediente.setItems(ingredientes);
    }
}
